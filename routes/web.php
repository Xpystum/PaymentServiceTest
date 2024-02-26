<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/orders', 301)->name('home');


Route::get('/orders', [OrderController::class, 'index'])->name('orders');

Route::get('/orders/{order:uuid}', [OrderController::class, 'show'])->name('orders.show');