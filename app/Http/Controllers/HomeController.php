<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('home.userpage',compact('products'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.layouts.master');
        }else
        {
            return view('home.userpage');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
