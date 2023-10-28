<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
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
    Route::get('shop-details/{product_id}', 'shop_details')->name('shop-details');
    Route::get('shopping-cart', 'shopping_cart')->name('shopping-cart');
    Route::get('wishlist', 'wishlist')->name('wishlist');
    Route::get('contact', 'contact')->name('contact');
    Route::post('shopping-cart', 'post_shopping_cart')->name('shopping-cart.create');
    Route::post('contact', 'post_contact_form')->name('contact.create');
    Route::post('devis', 'save_devis_request')->name('devis.create');
    Route::post('services', 'save_service')->name('service.create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
