<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('admin/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::delete('admin/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
// });

// Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/admin/update_order', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/admin/delete_order/{id}', [OrderController::class, 'destroy'])->name('orders.delete');
// });

// Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');
// });

// Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('admin/messages/delete/{id}', [MessageController::class, 'destroy'])->name('admin.messages.delete');
// });

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

require __DIR__.'/auth.php';
