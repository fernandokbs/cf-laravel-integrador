<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
