<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\MercadoPagoService;

class ProductController extends Controller
{
    public function index()
    {
        return inertia('products/index', [
            'products' => Product::get(),
        ]);
    }
    // pagar con MercadoPago
    public function mercadopago($id)
    {
        $producto = Product::findOrFail($id);
        $mercadoPagoService = new MercadoPagoService();
        $preference = $mercadoPagoService->createPreference($producto);
        
        return redirect()->away($preference->sandbox_init_point);
    }
    public function paypal(){

    }
    public function stripe(){
        
    }
}
