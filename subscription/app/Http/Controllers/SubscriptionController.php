<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Helpers\BillingInfoHelper;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function getByUser($user_id) {
        return response()->json(Subscription::with('product')->where('user_id', $user_id)->get());
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required'],
            'product_id' => ['required', 'exists:products,id'],
        ]);

        $billingInfo = BillingInfoHelper::getBillingInfoByUserId($request->user_id);

        $subscription = Subscription::create(array_merge($validated, [
            'status' => 'active',
            'billing_info' => $billingInfo,
        ]));

        return response()->json($subscription);
    }
}
