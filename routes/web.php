<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AdminAuthController;

Route::get('/', function () {
    return redirect()->route('admin.showLoginForm');
});

Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.showRegisterForm');
Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.showLoginForm');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', CheckAdmin::class])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [AdminController::class, 'userList'])->name('userList');
        Route::post('/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
        Route::get('/add-products/{id}', [AdminController::class, 'addProduct'])->name('addProduct');
        Route::post('/save-products', [AdminController::class, 'saveProduct'])->name('saveProduct');
        Route::get('/edit-product/{id}', [AdminController::class, 'editProduct'])->name('editProduct');
        Route::post('/update-product/{id}', [AdminController::class, 'updateProduct'])->name('updateProduct');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::post('/products/add', [ProductController::class, 'add'])->name('products.add');
    Route::resource('products', ProductController::class);
});

