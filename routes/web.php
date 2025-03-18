<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'check.admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'userList'])->name('admin.userList');
    Route::get('/admin/products', [AdminController::class, 'productList'])->name('admin.productList');
    Route::post('/admin/products', [AdminController::class, 'addProduct'])->name('admin.addProduct');
    Route::put('/admin/products/{id}', [AdminController::class, 'editProduct'])->name('admin.editProduct');
    Route::delete('/admin/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteProduct');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});
