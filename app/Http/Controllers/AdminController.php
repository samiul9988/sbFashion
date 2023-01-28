<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('admin.layouts.category.category',compact('categories'));
    }

    public function categoryForm(){
        return view('admin.layouts.category.addCategory');
    }

    public function add_category(Request $request)
    {
        $data = new Category();

        $data->category_name = $request->category;
        $data->save();

        return view('admin.addCategory')->with('message','Category Added Successfuly');

    }

    public function category_delete($id)
    {
        $data = Category::find($id);
        $data->delete();

        return redirect()->back();
    }

    
}
