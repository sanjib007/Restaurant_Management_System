<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\OrderCancelRequest;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Session;

class orderController extends Controller
{
    /**
     * Show the dedicated Home Delivery page with the current cart items.
     */
    public function homeDelivery(){
        $getAllItem = Session::has('orderedItem') ? Session::get('orderedItem') : [];
        return view('pages.secure.home-delivery', compact('getAllItem'));
    }

    public function submitOrder(Request $request){

        if($request->order_position == 'present'){
            $request->validate([
                'order_person_name' => 'required',
                'order_person_mobile' => 'required',
                'order_total_person' => 'required',
                'order_table_no' => 'required',
                'order_payment_method' => 'required'
            ]);
        }else if($request->order_position == 'takeaway' || $request->order_position == 'home_delivery'){
            $request->validate([
                'order_contact_name' => 'required',
                'order_contact_mobile' => 'required',
                'order_contact_address' => 'required',
                'order_payment_method' => 'required'
            ]);
        }

        $getAllItem = Session::get('orderedItem');
        
        $date = new DateTime();
        $result = $date->format('YmdHis');
        $randomNumber = rand(1,4);
        $orderId = $result.$randomNumber;
        $userId = Auth::user()->id;
        $orderDtails = [];

        try{
            $totalAmount = 0;

            foreach($getAllItem as $aItem){    
                $totalAmount = $totalAmount + ($aItem->item_price * $aItem->totalItem);
            }

            $order = [];
            $order['order_number'] = $orderId;
            $order['total_item'] = count($getAllItem);
            $order['order_status'] = "New";
            $order['payment_status'] = $request->order_payment_method == "cashOnDelivery" ? "Not Paid" : "Paid";
            $order['order_payment_method'] = $request->order_payment_method;
            $order['total_amount'] = $totalAmount;
            $order['order_position'] = $request->order_position;
            $order['user_id'] = $userId;
            $order['order_person_name'] = $request->order_person_name;
            $order['order_person_mobile'] = $request->order_person_mobile;
            $order['order_total_person'] = $request->order_total_person;
            $order['order_table_no'] = $request->order_table_no;
            $order['order_contact_name'] = $request->order_contact_name;
            $order['order_contact_mobile'] = $request->order_contact_mobile;
            $order['order_contact_address']  = $request->order_contact_address;

            $insertedOrder = Order::Create($order);

            foreach($getAllItem as $aItem){
                $aOrderDetail = [];
                $aOrderDetail['item_name'] = $aItem->item_name;
                $aOrderDetail['item_price'] = $aItem->item_price;
                $aOrderDetail['item_quentity'] = $aItem->totalItem;
                $aOrderDetail['item_id'] = $aItem->id;
                $aOrderDetail['order_id'] = $insertedOrder->id;
                $aOrderDetail['user_id'] = $userId;
    
                $orderDtails[] = $aOrderDetail;
    
                $totalAmount = $totalAmount + ($aItem->item_price * $aItem->totalItem);
            }
    
            $orderDetailInsert = Order_Detail::insert($orderDtails);
            if($insertedOrder->id > 0){
                Session::forget('orderedItem');
            }
            $msg = "Order Placed Successfully!";
            return redirect()->route('home')->with('success', $msg);
        }
        catch(Exception $e){
           $msg = $e->getMessage();
           return redirect()->route('home')->with('error', $msg);
        }
    }

    public function submitOrderProcess($id){
        $order = Order::findorfail($id)->update([
            'order_status' => 'Processing'
        ]);
        return redirect()->route('order')->withSuccess('Order moved to Processing.');
    }

    public function submitOrderComplete($id){
        $order = Order::findorfail($id)->update([
            'order_status' => 'Completed'
        ]);
        return redirect()->route('order')->withSuccess('Order marked as Completed.');
    }

    public function orderPaid($id){
        $order = Order::findorfail($id)->update([
            'payment_status' => 'Paid'
        ]);
        return redirect()->route('order')->withSuccess('Order marked as Paid.');
    }

    /**
     * Smart cancel:
     * - Cash on Delivery → cancel immediately
     * - Pre-paid methods → reject with message so frontend can open cancel-request modal
     */
    public function orderCancel($id){
        $order = Order::findOrFail($id);

        // Only allow cancellation of New orders
        if($order->order_status !== 'New'){
            $back = url()->previous() ?: route('home');
            return redirect($back)->with('error', 'Only new orders can be cancelled.');
        }

        // Cash on Delivery: cancel immediately
        if(strtolower($order->order_payment_method) === 'cashondelivery'){
            $order->update(['order_status' => 'Cancel']);
            $back = url()->previous() ?: route('home');
            return redirect($back)->with('success', 'Order cancelled successfully.');
        }

        // Pre-paid: redirect back with flag so JS opens cancel-request modal
        $back = url()->previous() ?: route('home');
        return redirect($back)->with('need_cancel_request', $order->id)
                               ->with('cancel_order_id', $order->id);
    }

    /**
     * Store a cancel request submitted by the customer
     */
    public function submitCancelRequest(Request $request){
        $request->validate([
            'order_id'      => 'required|exists:orders,id',
            'cancel_reason' => 'required|min:5|max:1000',
        ]);

        $order = Order::findOrFail($request->order_id);

        // Ensure the request belongs to the authenticated user
        if($order->user_id !== Auth::id()){
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Prevent duplicate pending requests
        $existing = OrderCancelRequest::where('order_id', $order->id)
                                      ->where('status', 'Pending')
                                      ->first();
        if($existing){
            return redirect()->back()->with('error', 'A cancel request is already pending for this order.');
        }

        OrderCancelRequest::create([
            'order_id'      => $order->id,
            'user_id'       => Auth::id(),
            'cancel_reason' => $request->cancel_reason,
            'status'        => 'Pending',
        ]);

        return redirect()->back()->with('success', 'Your cancel request has been submitted. The admin will review it shortly.');
    }

    /**
     * Admin: list all cancel requests (latest first)
     */
    public function cancelRequests(){
        $requests = OrderCancelRequest::with(['order', 'user'])
                        ->orderBy('id', 'desc')
                        ->paginate(15);

        $pendingCount = OrderCancelRequest::where('status', 'Pending')->count();

        return view('pages.secure.cancel-requests', compact('requests', 'pendingCount'));
    }

    /**
     * Admin: approve cancel request → mark order as Cancelled
     */
    public function approveCancelRequest(Request $request, $id){
        $request->validate([
            'admin_description' => 'required|min:3|max:1000',
        ]);

        $cancelRequest = OrderCancelRequest::findOrFail($id);
        $cancelRequest->update([
            'status'            => 'Approved',
            'admin_description' => $request->admin_description,
        ]);

        // Cancel the order
        Order::findOrFail($cancelRequest->order_id)->update([
            'order_status' => 'Cancel',
        ]);

        return redirect()->route('order.cancelRequests')
                         ->with('success', 'Cancel request approved. Order has been cancelled.');
    }

    /**
     * Admin: reject cancel request → order stays active
     */
    public function rejectCancelRequest(Request $request, $id){
        $request->validate([
            'admin_description' => 'required|min:3|max:1000',
        ]);

        $cancelRequest = OrderCancelRequest::findOrFail($id);
        $cancelRequest->update([
            'status'            => 'Rejected',
            'admin_description' => $request->admin_description,
        ]);

        return redirect()->route('order.cancelRequests')
                         ->with('success', 'Cancel request rejected. Order remains active.');
    }

    public function getOrderDetail($id): JsonResponse
    {
        $order = Order::findOrFail($id);
        $details = Order_Detail::where('order_id', $id)->get();

        return response()->json([
            'order'   => $order,
            'details' => $details,
        ]);
    }
}
