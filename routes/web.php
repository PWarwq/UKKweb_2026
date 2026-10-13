<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/index', [ProductController::class, 'index'])->name('index');

Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [ProductController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [ProductController::class, 'clearCart'])->name('cart.clear');