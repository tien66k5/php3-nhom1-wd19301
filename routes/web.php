<?php

use App\Livewire\Client\Home;
use App\Livewire\Client\Checkout;
use App\Livewire\Client\Store;
use App\Livewire\Client\Blank;
use App\Livewire\Client\Contact;
use App\Livewire\Client\About;
use App\Livewire\Client\Auth;
use App\Livewire\Client\User;
use App\Livewire\Client\Product;
use App\Livewire\Client\Google;


use Illuminate\Support\Facades\Route;

session_start(); 

Route::get('/', [Home::class, 'render'])->name('home.index');
Route::get('/home', [Home::class, 'render'])->name('home.index');
Route::get('/cart', [Checkout::class, 'cart'])->name('Account.index');
Route::get('/checkout', [Checkout::class, 'render'])->name('checkout.index');
Route::get('/product', [Product::class, 'render'])->name('product.index');
Route::get('/blank', [Blank::class, 'render'])->name('blank.index');
Route::get('/contact', [Contact::class, 'render'])->name('contact.index');
Route::get('/about', [About::class, 'render'])->name('about.index');
Route::get('/productList', [Store::class, 'render'])->name('store.index');
Route::get('/loginForm', [Auth::class, 'loginForm'])->name('loginForm.index');
Route::post('/loginForm', [Auth::class, 'login'])->name('login');

Route::get('/registerForm', [Auth::class, 'registerForm'])->name('registerForm.index');
Route::post('/registerForm',[Auth::class, 'register'])->name('register');


Route::get('auth/google', [Google::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [Google::class, 'handleGoogleCallback']);
Route::post('/logout', [Auth::class, 'logout'])->name('logout');
Route::get('/myAccount', [User::class, 'render'])->name('Account.index');



