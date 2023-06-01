<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['role:admin'])->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('admin.products.index');

    Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('products', [ProductController::class, 'store'])->name('admin.products.store');

    Route::get('products/update', [ProductController::class, 'update'])->name('admin.products.update');
    Route::post('products/{product}', [ProductController::class, 'edit'])->name('admin.products.edit');

    Route::post('products/delete', [ProductController::class, 'delete'])->name('admin.products.delete');

    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
});
