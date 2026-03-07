<?php

namespace App\Services;

use App\Models\Product;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Resources\Preference\Item;

class MercadoPagoService
{
    public function __construct()
    {
        // seteo acá para no tener que hacerlo en cada método 
        MercadoPagoConfig::setAccessToken(env('MP_ACCESS_TOKEN'));
    }

    // método encargado de tomar los valores del producto que el cliente desea comprar (indicando su respectivo modelo)
    public function createPreference(Product $product)
    {
        $client = new PreferenceClient();
        $item = new Item();
        $item->id = $product->id;
        $item->title = $product->nombre;
        $item->unit_price = $product->precio;
        $item->quantity = $product->cantidad;

        $preference = $client->create([
            "items" => [$item],
            "external_reference" => $product->id,
        ]);

        $preference->external_reference = $preference->id;

        return $preference;
    }
}