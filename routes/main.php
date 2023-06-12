<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('login/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('search', [SearchController::class, 'index'])->name('search.index');

// работа с продуктом
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');

// работа с корзиной

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::put('cart/{id}/update', [CartController::class, 'update'])->name('cart.update');
Route::post('cart/{id}/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::post('cart/deleteAll', [CartController::class, 'deleteAll'])->name('cart.deleteAll');

// работа с корзиной с сессиями
Route::post('cart/{id}/addSession', [CartController::class, 'addSession'])->name('cart.addSession');
Route::post('cart/deleteCartSession', [CartController::class, 'deleteCartSession'])->name('cart.deleteCartSession');
Route::post('cart/{id}/deleteCartSessionProduct', [CartController::class, 'deleteCartSessionProduct'])->name('cart.deleteCartSessionProduct');
Route::post('cart/{id}/updateSessionProduct', [CartController::class, 'updateSessionProduct'])->name('cart.updateSessionProduct');


Route::get('checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
Route::post('checkout', [PaymentController::class, 'processPayment'])->name('payment.process');

//
//Route::get('/bootstrap', function () {
//    return view('bootstrap.bootstrap');
//});


//Route::get('transaction', [\App\Http\Controllers\TransactionController::class,
//    '__invoke']);
