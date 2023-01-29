<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect'])->name('redirect');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');

Route::get('/category',[AdminController::class,'category'])->name('category');

Route::get('/category_delete/{id}',[AdminController::class,'category_delete'])->name('category_delete');

Route::get('/categoryForm',[AdminController::class,'categoryForm'])->name('categoryForm');

Route::post('/store_category',[AdminController::class,'add_category'])->name('store_category');

Route::get('/add_product',[ProductController::class,'add_product'])->name('add_product');

Route::post('/store_product',[ProductController::class,'store_product'])->name('store_product');

Route::get('/show_product',[ProductController::class,'show_product'])->name('show_product');

Route::get('/delete_product/{id}',[ProductController::class,'delete_product'])->name('delete_product');

Route::get('/edit_product/{id}',[ProductController::class,'edit_product'])->name('edit_product');

Route::put('/update_product/{id}',[ProductController::class,'update_product'])->name('update_product');

Route::get('/product_details/{id}',[ProductController::class,'product_details'])->name('product_details');

Route::post('/add_cart/{id}',[ProductController::class,'add_cart'])->name('add_cart');

Route::get('/show_cart',[ProductController::class,'show_cart'])->name('show_cart');

Route::get('/remove_cart/{id}',[ProductController::class,'remove_cart'])->name('remove_cart');

Route::get('/cash_order',[ProductController::class,'cash_order'])->name('cash_order');
