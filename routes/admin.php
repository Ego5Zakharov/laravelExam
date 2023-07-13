<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LogController;
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
    Route::post('products/storePost', [ProductController::class, 'storePost'])->name('admin.products.storePost');

    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('products/update', [ProductController::class, 'update'])->name('admin.products.update');
    Route::post('products/updatePOST', [ProductController::class, 'updatePOST'])->name('admin.products.updatePOST');

    Route::post('products/delete', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::post('products/categoryDelete', [ProductController::class, 'categoryDelete'])->name('admin.products.categoryDelete');
    Route::post('products/imageDelete', [ProductController::class, 'imageDelete'])->name('admin.products.imageDelete');

    Route::get('products/pagination/pagination-data', [ProductController::class, 'pagination'])->name('admin.products.pagination');

    // Изображения Продукта
    Route::post('image/{id}', [ImageController::class, 'destroy'])->name('admin.images.destroy');


    // Категории

    Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('categories/{category}/show', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::post('categories/update', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::post('categories/delete', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    Route::get('categories/pagination/paginate-data', [CategoryController::class, 'pagination'])->name('admin.categories.pagination');
    Route::get('categories/search-category', [CategoryController::class, 'search'])->name('admin.categories.search');

    // Пользователи
//    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');

    Route::get('logs', [LogController::class, 'index'])->name('admin.logs.index');
    Route::get('logs/{file}', [LogController::class, 'show'])->name('admin.logs.show');
    Route::delete('logs/{file}', [LogController::class, 'delete'])->name('admin.logs.delete');
});

