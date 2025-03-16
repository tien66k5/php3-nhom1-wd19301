<?php

use App\Http\Controllers\Client\BlankController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\StoreController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/blank', [BlankController::class, 'index'])->name('blank.index');
Route::get('/store', [StoreController::class, 'index'])->name('store.index');
