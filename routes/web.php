<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// productos
Route::get('/', [ProductController::class, 'index'])->name('index');

// Mercadopago
Route::post('/mercadopago/{id}', [ProductController::class, 'mercadopago'])->name('mercadopago');
// paypal.
Route::get('/paypal-payment/{id}', [ProductController::class, 'paypal'])->name('paypal');