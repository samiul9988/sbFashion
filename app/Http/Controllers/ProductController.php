<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add_product()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.layouts.product.product',compact('categories','products'));
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
        $product->image = $imageName;
        $product->category = $request->input('category');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->discount_price = $request->input('discount_price');

        $product->save();

        return redirect()->back();
    }

    public function show_product()
    {
        $products = Product::all();
        return view('admin.layouts.product.show_product',compact('products'));
    }

    public function delete_product($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect()->back();

    }

    public function edit_product($id)
    {
        $products = Product::find($id);
        $categories = Category::all();

        return view('admin.layouts.product.edit_product',compact('products','categories'));
    }

    public function update_product(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|file|max:255px'
        ]);


        $products = Product::find($id);
        $products->title = $request->input('title');
        $products->description = $request->input('description');

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $products->image =  $imageName;
        $products->category = $request->input('category');
        $products->quantity = $request->input('quantity');
        $products->price = $request->input('price');
        $products->discount_price = $request->input('discount_price');
        $products->update();
        return view('admin.layouts.product.show_product');
    }
}
