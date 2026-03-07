<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::post('/mercadopago/{id}', [ProductController::class, 'mercadopago'])->name('mercadopago');