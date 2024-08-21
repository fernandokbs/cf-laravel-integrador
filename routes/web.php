<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OauthController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth'])->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  Route::get('callback/{order:uuid}', [OrderController::class, 'callback'])->name('config');

  Route::post('add-to-cart/{product}', [ShoppingCartController::class, 'store']);
  Route::get('checkout', [ShoppingCartController::class, 'index'])->name('checkout');

  Route::get('download/{order}', [InvoiceController::class, 'download'])->name('invoice.download');
  Route::resource('invoices', InvoiceController::class)->only(['index', 'store']);
  Route::resource('products', ProductController::class);
  Route::resource('orders', OrderController::class)->only('store');

});

Route::get('redirect/github', [OauthController::class, 'redirectGithub']);
Route::get('auth/callback', [OauthController::class, 'callback']);