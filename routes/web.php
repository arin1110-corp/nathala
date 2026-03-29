<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('nath_homepage');
});



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/product', function () {
    return view('admin.product');
})->name('admin.product');