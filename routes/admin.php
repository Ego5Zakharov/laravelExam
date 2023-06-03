<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['role:admin'])->group(function () {

    // Список контроллеров
    Route::get('', [AdminController::class, 'index'])->name('admin.index');

    // Продукты
    Route::get('products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('products/{product}/show', [ProductController::class, 'show'])->name('admin.products.show');

    Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('admin.products.store');

    Route::get('products/update', [ProductController::class, 'update'])->name('admin.products.update');
    Route::post('products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');

    Route::post('products/{product}/delete', [ProductController::class, 'delete'])->name('admin.products.delete');

    // Категории

    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('categories/{product}/show', [CategoryController::class, 'show'])->name('admin.categories.show');

    Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');

    Route::get('categories/update', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::post('categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');

    Route::post('categories/{category}/delete', [CategoryController::class, 'delete'])->name('admin.categories.delete');


    // Пользователи

    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
});


