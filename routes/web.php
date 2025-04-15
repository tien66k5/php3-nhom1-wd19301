<?php

use App\Livewire\Client\Home;
use App\Livewire\Client\Checkout;
use App\Livewire\Client\Store;
use App\Livewire\Client\Blank;
use App\Livewire\Client\Contact;
use App\Livewire\Client\About;
use App\Livewire\Client\Auth;
use App\Livewire\Client\Google;
use App\Livewire\Client\ProductDetail;
use App\Livewire\Client\UserComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Client\Auth\Login;
use App\Livewire\Client\Auth\Register;
use App\Livewire\Client\Auth\ForgotPassword;
use App\Livewire\Client\Auth\ResetPassword;
use App\Livewire\Client\Order;
use App\Livewire\Client\OrderUser;
use App\Livewire\Client\Config;

use function Termwind\render;
session_start();
Route::get('/', Home::class)->name('home.index');
Route::get('/home', Home::class)->name('home.index');
Route::get('/cart', Checkout::class)->name('Account.index');
Route::get('/checkout', Checkout::class)->name('checkout.index');
Route::get('/product/{id}', ProductDetail::class)->name('product.detail');

Route::get('/blank', Blank::class)->name('blank.index');
Route::get('/contact', Contact::class)->name('contact.index');
Route::get('/about', About::class)->name('about.index');
Route::get('/store', Store::class)->name('store');
Route::get('/loginForm', Login::class)->name('loginForm.index');
Route::get('/registerForm', Register::class)->name('registerForm.index');
Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');

Route::get('/config',Config::class)->name('config.index');
// Route::post('/forgot-password', [Auth::class, 'forgotEmail'])->name('password.email');
// Route::get('/reset-password/{token}', [Auth::class, 'resetForm'])->name('password.reset');
// Route::post('/reset-password', [Auth::class, 'resetPasswordUpdate'])->name('password.update');

// Route::get('auth/google', [Google::class, 'redirectToGoogle'])->name('auth.google');
// Route::get('auth/google/callback', [Google::class, 'handleGoogleCallback']);

// Route::post('/logout', [Auth::class, 'logout'])->name('logout');

Route::get('/myAccount', UserComponent::class)->name('Account.index');
Route::get('/Orders', OrderUser::class)->name('Order.index');
// Route::post('/myAccount/edit', [UserComponent::class, 'updateProfile'])->name('Account.update');




// Route::get('/loginForm', [Auth::class, 'loginForm'])->name('loginForm.index');
// Route::post('/loginForm', [Auth::class, 'login'])->name('login');

// Route::get('/registerForm', [Auth::class, 'registerForm'])->name('registerForm.index');
// Route::post('/registerForm',[Auth::class, 'register'])->name('register');

// Route::get('/forgot-password', [Auth::class, 'forgotForm'])->name('password.request');
// Route::post('/forgot-password', [Auth::class, 'forgotEmail'])->name('password.email');
// Route::get('/reset-password/{token}', [Auth::class, 'resetForm'])  /* ->where('token', '.*') */->name('password.reset');

// Route::post('/reset-password', [Auth::class, 'resetPasswordUpdate'])->name('password.update');

Route::get('auth/google', [Google::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [Google::class, 'handleGoogleCallback']);
Route::post('/logout', [Auth::class, 'logout'])->name('logout');

// Route::get('/myAccount', [UserComponent::class, 'render'])->name('Account.index');
Route::post('/myAccount/edit', [UserComponent::class, 'updateProfile'])->name('Account.update');



Route::get('/error/403', function () {
    return view('errors');
})->name('error.403');
