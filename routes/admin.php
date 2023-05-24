<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['role:admin'])->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::post('products/', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('products/update', [ProductController::class, 'update'])->name('admin.products.update');
    Route::post('products/delete', [ProductController::class, 'delete'])->name('admin.products.delete');

    Route::get('products/paginate-data', [ProductController::class, 'pagination']);
    Route::get('products/search', [ProductController::class, 'search'])->name('admin.products.search');
});
