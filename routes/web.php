<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('nath_homepage');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});