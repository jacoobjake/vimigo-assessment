<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function myAddresses()
    {
        $user = auth()->user();

        return response()->json([
            'addresses' => $user->addresses()->get()
        ]);
    }

    public function updateAddress(Request $request)
    {
        $validated = $request->validate([
            'address_type' => ['required', 'in:billing,home'],
            'line_1' => ['required', 'string'],
            'line_2' => ['nullable', 'string'],
            'line_3' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'postcode' => ['required', 'string'],
            'country' => ['required', 'string'],
            'phone' => ['required', "regex:/^\d{9,15}$/"],
        ]);

        $user = auth()->user();

        $address = $user->addresses()->firstOrCreate([
            'address_type' => $validated['address_type'],
        ], array_diff_key($validated, ['address_type' => 1]));

        return response()->json($address);
    }

    public function getMyAddressByType($address_type)
    {
        $user = auth()->user();

        return response()->json($user->addresses()->firstWhere('address_type', $address_type));
    }
}
