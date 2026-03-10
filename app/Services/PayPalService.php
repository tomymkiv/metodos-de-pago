<?php

namespace App\Services;

use App\Models\Product;
use Srmklive\PayPal\Facades\PayPal as PayPalFacades;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalService
{
    public function createPreference(Product $product)
    {
        $provider = new PayPalClient;

        // Through facade. No need to import namespaces
        $provider = PayPalFacades::setProvider();

    }
}
