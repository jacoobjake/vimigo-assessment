<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class BillingInfoHelper
{
    public static function getBillingInfoByUserId($user_id)
    {
        $gatewayUrl = config('app.gateway_api_url');
        $response = Http::withHeaders([
            'API-Key' => config('app.gateway_api_key')
        ])->withUrlParameters([
            'endpoint' => $gatewayUrl,
            'user_id' => $user_id,
        ])->get('{+endpoint}/billing-info/{user_id}');

        return $response->json();
    }
}