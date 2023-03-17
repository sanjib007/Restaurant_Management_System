<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

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
}
