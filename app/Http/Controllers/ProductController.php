<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\MercadoPagoService;
use Illuminate\Http\Request as HttpRequest;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Symfony\Component\HttpFoundation\Request;

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
        $mercadoPagoService = new MercadoPagoService;
        $preference = $mercadoPagoService->createPreference($producto);

        // dd($preference->sandbox_init_point);
        return redirect()->away($preference->init_point);
    }

    public function paypal($id)
    {
        $product = Product::findOrFail($id);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal')); // seteo la API con el archivo "config.php", con la informacion de PayPal
        $provider->getAccessToken();
        $data = [
            'intent' => 'CAPTURE', // CAPTURE = pago inmediato, AUTHORIZE = pago autorizado

            // agrego las páginas para cuando el pago fue exitoso y cuando no lo fue
            'application_context' => [
                'return_url' => route('paypal.payment.success'),
                'cancel_url' => route('paypal.payment.cancel'),
            ],
            // unidades que voy a usar para pagar
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $product->price,
                    ],
                ],
            ],
        ];
        $order = $provider->createOrder($data);
        dd($order);
        $url = collect($order['links'])->where('rel', 'approve')->first()['href'];

        return redirect()->away($url);
    }
    public function paypalPaymentSuccess(HttpRequest $request){
        $token = $request['token'];
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal')); // seteo la API con el archivo "config.php", con la informacion de PayPal
        $provider->getAccessToken();
        $order = $provider->capturePaymentOrder($token);
        if (isset($order['status']) && $order['status'] === 'COMPLETED') {
            # - COMPLETED = Bien
            return 'Pago exitoso';
        }
        // dd($order); // en caso de error, saldra esto
        return 'Pago fallido';
    }
    public function stripe() {}
}
