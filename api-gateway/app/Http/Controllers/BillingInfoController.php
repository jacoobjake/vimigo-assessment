<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BillingInfoController extends Controller
{
    public function getUserBillingInfo($user_id)
    {
        $user = User::findOrFail($user_id);

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'billing_address' => $user->addresses()->firstWhere('address_type', 'billing'),
        ]);
    }
}
