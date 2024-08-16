<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductController;


Route::get('/products', [ProductController::class, 'index']);
Route::post('/add-to-wishlist', [ProductController::class, 'addToWishlist'])->name('add.to.wishlist');
Route::post('/add-to-cart', [ProductController::class, 'addToCart'])->name('add.to.cart');

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
