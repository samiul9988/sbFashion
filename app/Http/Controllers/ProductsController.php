<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user                 = Auth::user();
            $product              = Product::find($id);
            $cart                 = new Cart();

            $cart ->name          = $user->name;
            $cart ->email         = $user->email;
            $cart ->phone         = $user->phone;
            $cart ->address       = $user->address;
            $cart ->product_title = $product->title;

            if($product->discount_price!=null)
            {
                $cart->price = $product->discount_price * $request->quantity;
            }else
            {
                $cart->price = $product->price * $request->quantity;
            }

            $cart ->quantity      = $request->quantity;
            $cart ->image         = $product->image;
            $cart ->product_id    = $product->id;
            $cart ->user_id       = $user->id;

            $cart->save();
            return redirect()->back();

        }else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id','=',$id)->get();
            return view('home.show_cart',compact('carts'));
        }
        else
        {
            return redirect('login');
        }

    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userId = $user->id;
        $carts   = Cart::where('user_id','=',$userId)->get();

        foreach($carts as $cart)
        {
            $order                  = new Order();

            $order->name            = $cart->name;
            $order->email           = $cart->email;
            $order->phone           = $cart->phone;
            $order->address         = $cart->address;

            $order->user_id         = $cart->user_id;
            $order->quantity        = $cart->quantity;
            $order->price           = $cart->price;
            $order->image           = $cart->image;
            $order->product_id      = $cart->product_id;

            $order->payment_status  = 'Cash On Delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id                = $cart->id;

            $cart                   = Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back();
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }

    public function order()
    {
        $orders = Order::all();
        return view('admin.layouts.product.order',compact('orders'));
    }

    public function delivered($id)
    {
        $orders = Order::find($id);

        $orders->status = "Delivered";

        $orders->save();

        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $orders = Order::find($id);
        $pdf = PDF::loadView('admin.pdf',compact('orders'));
        return $pdf->download('orders_details.pdf');
    }

    public function search(Request $request)
    {

        $searchText = $request->search;
        $orders      = Order::where('name','LIKE',"%$searchText%")->orWhere('address','LIKE',"$searchText")->get();



        return view('admin.layouts.product.order',compact('orders'));
    }

    public function order_page()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userId = $user->id;

            $orders = Order::where('id','==','$userID')->get();


            return view('home.order_page',compact('orders'));
        }else{
            return redirect('login');
        }
    }

    public function product_search(Request $request)
    {
        $searchText = $request->search;
        $product    = Product::where('title','LIKE',"%$searchText%")->paginate(10);

        return view('home.product',compact('product'));

    }
}
