<?php

use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\BlankController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\GoogleController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\StoreController;
use App\Http\Controllers\Client\UserController;


use App\Models\Product;
use Illuminate\Support\Facades\Route;

session_start(); 

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/cart', [CheckoutController::class, 'cart'])->name('Account.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/blank', [BlankController::class, 'index'])->name('blank.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/loginForm', [AuthController::class, 'loginForm'])->name('loginForm.index');
Route::post('/loginForm', [AuthController::class, 'login'])->name('login');

Route::get('/registerForm', [AuthController::class, 'registerForm'])->name('registerForm.index');
Route::post('/registerForm',[AuthController::class, 'register'])->name('register');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/myAccount', [UserController::class, 'index'])->name('Account.index');
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');
