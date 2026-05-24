<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;

Route::prefix('admin')->group(
    function () {

        /*
    |--------------------------------------------------------------------------
    | Guest Admin
    |--------------------------------------------------------------------------
    */

        Route::middleware('guest:admin')->group(function () {

            Route::get('/login', [AuthController::class, 'login'])
                ->name('admin.login');

            Route::post('/login', [AuthController::class, 'authenticate'])
                ->name('admin.authenticate');
        });

        /*
    |--------------------------------------------------------------------------
    | Authenticated Admin
    |--------------------------------------------------------------------------
    */

        Route::middleware('auth:admin')->group(function () {

            Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('admin.dashboard');

            Route::get('products', [DashboardController::class, 'products'])
                ->name('admin.products');

            Route::post('/logout', [AuthController::class, 'logout'])
                ->name('admin.logout');
        });


        Route::prefix('admin')->middleware('auth:admin')->group(function () {

            Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
            Route::get('/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
            Route::post('/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');

            Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
            Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');

            Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
            Route::patch('/admin/kategori/{id}/toggle', [KategoriController::class, 'toggleStatus'])
                ->name('admin.kategori.toggle');
        });
        Route::prefix('admin')->middleware('auth:admin')->group(function () {
            Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product.index');
            Route::get('/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.product.create');
            Route::post('/product', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.product.store');

            Route::get('/product/{id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.product.edit');
            Route::put('/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.update');

            Route::delete('/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.product.destroy');
            Route::patch('/admin/product/{id}/toggle', [App\Http\Controllers\Admin\ProductController::class, 'toggleStatus'])
                ->name('admin.product.toggle');
        });
    }
);