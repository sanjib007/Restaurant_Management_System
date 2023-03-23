<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Session;

class ItemController extends Controller
{
    public function itemInsert(Request $request){
        $request->validate([
            'item_name' => 'required|unique:items',
            'item_description' => 'required',
            'item_image' => 'required',
            'item_price' => 'required',
            'category_id' => 'required',
        ]);

        $imageName = '';
        if($image = $request->file('item_image')){      
            $imageName = time()."-".$image->getClientOriginalName();      
            $image->move("assets/img/items", $imageName);
    
        }
        
        $item = Item::create([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'item_image' => $imageName,
            'item_price' => $request->item_price,
            'category_id' => $request->category_id,
          ]);
          return redirect()->route('item-insert')->withSuccess('Great! You have Successfully loggedin');
    }

    public function itemEdit($id){
        $item = Item::findorfail($id);
        $categories = Category::all();
        return view('pages.secure.item.edit_item', compact('item','categories'));
    }


    public function itemUpdate(Request $request, $id){

        $item = Item::findorfail($id);
        $request->validate([
            'item_name' => 'required',
            'item_description' => 'required',
            'item_image' => 'required',
            'item_price' => 'required',
            'category_id' => 'required',
        ]);

        $imageName = '';
        if($image = $request->file('item_image')){      
            $imageName = time()."-".$image->getClientOriginalName();      
            $image->move("assets/img/items", $imageName);    
        }else{
            $imageName = $item->category_image;
        }

        $cat = Item::where('id', $id)->update([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'item_image' => $imageName,
            'item_price' => $request->item_price,
            'category_id' => $request->category_id,
          ]);

          return redirect()->route('item-insert')->withSuccess('Great! You have Successfully loggedin');
    }

    public function itemDelete($id){
        $item = Item::findorfail($id);
        $item->delete();
        return redirect()->route('item-insert')->withSuccess('Delete success full');
    }


    public function showOurMenu()
    {
        
        $categories = Category::all();        
        foreach($categories as $aCat){
            $test = Item::where('category_id', '=', $aCat->id)->get();
            $aCat['items'] = $test;
        };
        
        return view('pages.guest.our-menu', compact('categories'));
    }

    public function getItemWithJson($id)
    {
        $item = Item::find($id);
        return response()->json($item);
    }

    public function getAllSessionItem()
    {
        //Session::forget('orderedItem');
        $getAllItem = [];
        if(Session::has('orderedItem'))
        {
            $getAllItem = Session::get('orderedItem');
        }
        return response()->json($getAllItem);
    }

    public function setOrderitem(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'totalItem' => 'required'
        ]);        
        
        $getItem = Item::findorfail($request->id);
        $getItem['totalItem'] = $request->totalItem;

        $getAllItem = [];
        

        if(Session::has('orderedItem'))
        {
            
            $getAllItem = Session::get('orderedItem');
            $updatItem = "";

            foreach ($getAllItem as $value) {
                if($value->id == $request->id){
                    $sum = $value->totalItem + $request->totalItem;
                    $value->totalItem = $sum;
                    $updatItem = $value;
                }
            }
            if($updatItem != ""){
                $newvar = array_values($getAllItem);
                Session::put('orderedItem', $newvar);
            }else{
                $getAllItem[] = $getItem;
                Session::put('orderedItem', $getAllItem);
            }

        }
        else
        {
            $getAllItem[] = $getItem;
            Session::put('orderedItem', $getAllItem);
        }
        
        $totalItem = Session::get('orderedItem');
       

        return response()->json($totalItem);
    }

    public function removeItemFromSession($id)
    {
        $newItem = [];
        if(Session::has('orderedItem'))
        {
            $getAllItem = Session::get('orderedItem');
            foreach ($getAllItem as $key => $value) {
                if($value->id == $id){
                    unset($getAllItem[$key]);
                    //$getAllItem->forget($key);
                }
            }
            $newItem = array_values($getAllItem);

            Session::forget('orderedItem');
            Session::put('orderedItem', $newItem);
        }
        return response()->json($newItem);
    }

    public function deleteRequestedItem($id)
    {
        $newItem = [];
        if(Session::has('orderedItem'))
        {
            $getAllItem = Session::get('orderedItem');
            foreach ($getAllItem as $key => $value) {
                if($value->id == $id){
                    unset($getAllItem[$key]);
                    //$getAllItem->forget($key);
                }
            }
            $newItem = array_values($getAllItem);
            Session::forget('orderedItem');
            Session::put('orderedItem', $newItem);
        }
        return redirect()->route('home')->with(['newItem' => $newItem]);
    }

    public function changeItemQuantity(Request $request){
        $getAllItem = Session::get('orderedItem');

            foreach ($getAllItem as $value) {
                if($value->id == $request->id){
                    $value->totalItem =$request->totalItem;
                }
            }
            $newvar = array_values($getAllItem);
            Session::put('orderedItem', $newvar);

            return response()->json($newvar);
    }

    


}
