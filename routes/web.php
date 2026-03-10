<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// productos
Route::get('/', [ProductController::class, 'index'])->name('index');

// Mercadopago
Route::get('/mercadopago/{id}', [ProductController::class, 'mercadopago'])->name('mercadopago');
// paypal.
// obtengo el producto y asigno la URL en base a ese producto 
Route::get('/paypal/{id}', [ProductController::class, 'paypal'])->name('paypal');
// paypal, en caso de pago exitoso
Route::get('/paypal/payment/success', function () {
    return 'Pago exitoso';
})->name('paypal.payment.success');
// paypal, en caso de pago fallido o cancelado
Route::get('/paypal/payment/cancel', function () {
    return 'Pago cancelado';
})->name('paypal.payment.cancel');