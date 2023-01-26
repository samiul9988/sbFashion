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

    public function add_product()
    {
        return view('admin.layouts.product.product');
    }

    public function store_product(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'category' => 'required',
            'price' => 'required',
            'discount_price' => 'required'
        ]);

        $product = new Product();

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);



        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->image = $request->file('image');
        $product->category = $request->input('category');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->discount_price = $request->input('discount_price');

        $product->save();

        return redirect()->back();
    }
}
