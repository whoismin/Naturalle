<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/wishlist', [ProductController::class, 'addToWishlist'])->name('products.addToWishlist');
Route::post('/cart', [ProductController::class, 'addToCart'])->name('products.addToCart');


Route::get('/checkout', [OrderController::class, 'show'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'store']);


Route::middleware(['auth'])->group(function () {
    Route::post('/wishlist/add', [ShopController::class, 'addToWishlist'])->name('wishlist.add');
    Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');
    Route::get('/products', [ShopController::class, 'showProducts'])->name('products.index');
});

Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMessage'])->name('sendMessage');

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/add-to-cart', [WishlistController::class, 'addToCart'])->name('wishlist.addToCart');
Route::get('/wishlist/delete/{id}', [WishlistController::class, 'delete'])->name('wishlist.delete');
Route::get('/wishlist/delete-all', [WishlistController::class, 'deleteAll'])->name('wishlist.deleteAll');

require __DIR__.'/auth.php';
