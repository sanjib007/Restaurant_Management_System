<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryInsert(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories',
            'category_description' => 'required',
            'category_image' => 'required'
        ]);

        $imageName = '';
        if($image = $request->file('category_image')){      
            $imageName = time()."-".$image->getClientOriginalName();      
            $image->move("assets/img/category", $imageName);
    
        }

        $cat = Category::create([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'category_image' => $imageName
          ]);

          return redirect()->route('item-insert')->withSuccess('Great! You have Successfully loggedin');
    }

    public function categoryEdit($id){
        $category = Category::findorfail($id);
        return view('pages.secure.category.editCategory', compact('category'));
    }


    public function categoryUpdate(Request $request, $id){

        $category = Category::findorfail($id);
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
        ]);

        $imageName = '';
        if($image = $request->file('category_image')){      
            $imageName = time()."-".$image->getClientOriginalName();      
            $image->move("assets/img/category", $imageName);    
        }else{
            $imageName = $category->category_image;
        }

        $cat = Category::where('id', $id)->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'category_image' => $imageName
          ]);

          return redirect()->route('item-insert')->withSuccess('Great! You have Successfully loggedin');
    }

    public function categoryDelete($id){
        $cat = Category::findorfail($id);
        $cat->delete();
        return redirect()->route('item-insert')->withSuccess('Delete success full');
    }
















}
