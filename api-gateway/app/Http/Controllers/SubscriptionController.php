<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    protected $serviceUrl;

    public function __construct()
    {
        $this->serviceUrl = config('app.subscription_service_url');
    }

    public function mySubscriptions(Request $request)
    {
        $user = auth()->user();

        $response = Http::withUrlParameters([
            'endpoint' => $this->serviceUrl,
            'user_id' => $user->id,
        ])->get('{+endpoint}/user-subscription/{user_id}');

        return $response->json();
    }

    public function productList(Request $request)
    {
        $response = Http::withUrlParameters([
            'endpoint' => $this->serviceUrl,
        ])->get('{+endpoint}/products');

        return $response->json();
    }

    public function newSubscription(Request $request)
    {
        $response = Http::withUrlParameters([
            'endpoint' => $this->serviceUrl,
        ])->post('{+endpoint}/subscribe', $request->all());

        return $response->json();
    }
}
