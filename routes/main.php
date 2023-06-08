<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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
Route::post('cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::put('cart/{id}/update', [CartController::class, 'update'])->name('cart.update');


Route::post('/card/add/{product}', [CartController::class, 'add'])->name('card.add');
Route::get('/bootstrap', function () {
    return view('bootstrap.bootstrap');
});


//Route::get('transaction', [\App\Http\Controllers\TransactionController::class,
//    '__invoke']);
