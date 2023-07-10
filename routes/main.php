<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SmsController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('login/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('search', [SearchController::class, 'index'])->name('search.index');
Route::get('search/pagination/paginate-data', [SearchController::class, 'pagination'])->name('search.pagination');
Route::get('search/search-product', [SearchController::class, 'search'])->name('search.search');
Route::get('search/sortByAsc', [SearchController::class, 'sortByAsc'])->name('search.sortByAsc');
Route::get('search/sortByDesc', [SearchController::class, 'sortByDesc'])->name('search.sortByDesc');

Route::get('/get', function () {
//    $posts = Product::query()->whereHas('feedbacks', function ($query) {
//        $query->where('rating', '>=',5);
//    })->get();
//    dd($posts);
    return view('grid.index');
});

// работа с продуктом
Route::get('product/{productId}/show', [ProductController::class, 'show'])->name('product.show');

// работа с комментариями
Route::post('feedbacks/{productId}', [CommentController::class, 'store'])->name('feedback.store');
Route::post('/feedback/like/{feedbackId}', [CommentController::class, 'like'])->name('feedback.like');
Route::post('/feedback/dislike/{feedbackId}', [CommentController::class, 'dislike'])->name('feedback.dislike');
//Route::post('feedback/{feedbackId}/{action}', [CommentController::class, 'likeOrDislike'])->name('feedback.likeOrDislike');


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


Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');


Route::get('delivery', [DeliveryController::class, 'create'])->name('delivery.create');
Route::post('delivery/store', [DeliveryController::class, 'store'])->name('delivery.store');

Route::get('checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('checkout/{id}/store', [OrderController::class, 'store'])->name('order.store');
Route::delete('order/{id}/delete', [OrderController::class, 'delete'])->name('order.delete');


Route::post('/send-sms', [SmsController::class, 'sendSms'])->name('send.sms');


//Route::get('transaction', [\App\Http\Controllers\TransactionController::class,
//    '__invoke']);

//Route::get('bootstrap','bootstrap.bootstrap')->name('boostrap');

Route::get('bootstrap', function () {
    return view('bootstrap.bootstrap');
})->name('boostrap');
