<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Detail;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class orderController extends Controller
{
    public function submitOrder(Request $request){

        if($request->order_position == 'present'){
            $request->validate([
                'order_person_name' => 'required',
                'order_person_mobile' => 'required',
                'order_total_person' => 'required',
                'order_table_no' => 'required',
                'order_payment_method' => 'required'
            ]);
        }else if($request->order_position == 'takeaway'){
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
            $msg = "Inserted Successfull";
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
        return redirect()->route('order')->withSuccess('Great! You have Successfully order');
    }

    public function submitOrderComplete($id){
        $order = Order::findorfail($id)->update([
            'order_status' => 'Completed'
        ]);
        return redirect()->route('order')->withSuccess('Great! You have Successfully order');
    }

    public function orderPaid($id){
        $order = Order::findorfail($id)->update([
            'payment_status' => 'Paid'
        ]);
        return redirect()->route('order')->withSuccess('Great! You have Successfully order');
    }

    public function orderCancel($id){
        $order = Order::findorfail($id)->update([
            'order_status' => 'Cancel'
        ]);
        return redirect()->route('order')->withSuccess('Great! You have Successfully order');
    }





    
}
