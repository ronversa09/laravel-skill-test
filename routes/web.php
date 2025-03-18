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
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', CheckAdmin::class])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [AdminController::class, 'userList'])->name('userList');
        Route::post('/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
        Route::get('/add-products/{id}', [AdminController::class, 'addProduct'])->name('addProduct');
        Route::post('/save-products', [AdminController::class, 'saveProduct'])->name('saveProduct');
        Route::get('/edit-product/{id}', [AdminController::class, 'editProduct'])->name('editProduct');
        Route::get('/update-product/{id}', [AdminController::class, 'updateProduct'])->name('updateProduct');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});
