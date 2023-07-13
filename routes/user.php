<?php

use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PersonalAccountController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('account', [PersonalAccountController::class, 'index'])->name('user.account.index');

    Route::get('account/orders', [OrderController::class, 'index'])->name('user.account.orders.index');
    Route::get('account/orders/{order}/show', [OrderController::class, 'show'])->name('user.account.orders.show');

    Route::get('account/edit', [PersonalAccountController::class, 'edit'])->name('user.account.edit');
    Route::post('account/{user}/update', [PersonalAccountController::class, 'update'])->name('user.account.update');
});
