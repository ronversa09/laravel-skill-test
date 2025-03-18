<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AdminAuthController;

Route::get('admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.showRegisterForm');
Route::post('admin/register', [AdminAuthController::class, 'register'])->name('admin.register');
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.showLoginForm');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');

Route::middleware(['auth', CheckAdmin::class])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [AdminController::class, 'userList'])->name('userList');
        Route::get('/products', [AdminController::class, 'productList'])->name('productList');
        Route::post('/products', [AdminController::class, 'addProduct'])->name('addProduct');
        Route::put('/products/{id}', [AdminController::class, 'editProduct'])->name('editProduct');
        Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('deleteProduct');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});
