<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ClickController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TrackingController;

Route::get('/', [HomeController::class, 'index'])
    ->name('front.home');

Route::get('/produk/{slug}', [HomeController::class, 'productDetail'])
    ->name('front.product.detail');

Route::get('/kategori/{slug}', [HomeController::class, 'kategoriDetail'])
    ->name('front.kategori.detail');

Route::get('/page/{slug}', [HomeController::class, 'page'])
    ->name('front.page.detail');

Route::get('/go/{slug}', [TrackingController::class, 'click'])
    ->name('product.click');


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
            Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');

            Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');

            Route::post('/product', [ProductController::class, 'store'])->name('admin.product.store');

            Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');

            Route::put('/product/{id}', [ProductController::class, 'update'])->name('admin.product.update');

            Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

            Route::patch('/admin/product/{id}/toggle', [ProductController::class, 'toggleStatus'])
                ->name('admin.product.toggle');

            Route::get('/slider', [SliderController::class, 'index'])
                ->name('admin.slider.index');

            Route::get('/slider/create', [SliderController::class, 'create'])
                ->name('admin.slider.create');

            Route::post('/slider', [SliderController::class, 'store'])
                ->name('admin.slider.store');

            Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])
                ->name('admin.slider.edit');

            Route::put('/slider/{id}', [SliderController::class, 'update'])
                ->name('admin.slider.update');

            Route::patch('/slider/{id}/toggle', [SliderController::class, 'toggleStatus'])
                ->name('admin.slider.toggle');

            Route::delete('/slider/{id}', [SliderController::class, 'destroy'])
                ->name('admin.slider.destroy');

            Route::get('/click', [ClickController::class, 'index'])
                ->name('admin.click.index');

            Route::get('/analytics', [AnalyticsController::class, 'index'])
                ->name('admin.analytics.index');


            Route::get('/page', [PageController::class, 'index'])
                ->name('admin.page.index');

            Route::get('/page/create', [PageController::class, 'create'])
                ->name('admin.page.create');

            Route::post('/page', [PageController::class, 'store'])
                ->name('admin.page.store');

            Route::get('/page/{id}/edit', [PageController::class, 'edit'])
                ->name('admin.page.edit');

            Route::put('/page/{id}', [PageController::class, 'update'])
                ->name('admin.page.update');

            Route::patch('/page/{id}/toggle', [PageController::class, 'toggleStatus'])
                ->name('admin.page.toggle');

            Route::delete('/page/{id}', [PageController::class, 'destroy'])
                ->name('admin.page.destroy');

            Route::get('/menu', [MenuController::class, 'index'])
                ->name('admin.menu.index');

            Route::get('/menu/create', [MenuController::class, 'create'])
                ->name('admin.menu.create');

            Route::post('/menu', [MenuController::class, 'store'])
                ->name('admin.menu.store');

            Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])
                ->name('admin.menu.edit');

            Route::put('/menu/{id}', [MenuController::class, 'update'])
                ->name('admin.menu.update');

            Route::patch('/menu/{id}/toggle', [MenuController::class, 'toggleStatus'])
                ->name('admin.menu.toggle');

            Route::delete('/menu/{id}', [MenuController::class, 'destroy'])
                ->name('admin.menu.destroy');


            Route::get('/setting', [SettingController::class, 'index'])
                ->name('admin.setting.index');

            Route::put('/setting', [SettingController::class, 'update'])
                ->name('admin.setting.update');

            Route::get('/admin-user', [AdminUserController::class, 'index'])
                ->name('admin.adminuser.index');

            Route::get('/admin-user/create', [AdminUserController::class, 'create'])
                ->name('admin.adminuser.create');

            Route::post('/admin-user', [AdminUserController::class, 'store'])
                ->name('admin.adminuser.store');

            Route::get('/admin-user/{id}/edit', [AdminUserController::class, 'edit'])
                ->name('admin.adminuser.edit');

            Route::put('/admin-user/{id}', [AdminUserController::class, 'update'])
                ->name('admin.adminuser.update');

            Route::patch('/admin-user/{id}/toggle', [AdminUserController::class, 'toggleStatus'])
                ->name('admin.adminuser.toggle');

            Route::delete('/admin-user/{id}', [AdminUserController::class, 'destroy'])
                ->name('admin.adminuser.destroy');
        });
    }
);