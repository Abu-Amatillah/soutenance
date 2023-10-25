<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('shop', 'shop')->name('shop');
    Route::post('cart', 'addToCart')->name('add-to-cart');
    Route::post('wishlist', 'addToWishlist')->name('add-to-whishlist');
});
Route::get('blog', function () {
    return view('blog');
})->name('blog');
Route::get('blog-details', function () {
    return view('blog-details');
})->name('blog-details');
Route::get('services', function () {
    return view('services');
})->name('services');
Route::get('shop-details', function () {
    return view('shop-details');
})->name('shop-details');
Route::get('shoping-cart', function () {
    return view('shoping-cart');
})->name('shoping-cart');
Route::get('checkout', function () {
    return view('checkout');
})->name('checkout');
Route::get('blog-details', function () {
    return view('blog-details');
})->name('blog-details');
Route::get('contact', function () {
    return view('contact');
})->name('contact');
