<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function() {    
    Route::prefix('me')->group(function() {
        Route::get('/', [Controllers\ProfileController::class, 'me']);
    });
    Route::prefix('my-address')->group(function() {
        Route::get('/{address_type}', [Controllers\AddressController::class, 'getMyAddressByType']);
        Route::get('/', [Controllers\AddressController::class, 'myAddresses']);
        Route::post('/', [Controllers\AddressController::class, 'updateAddress']);
    });
    Route::prefix('billing-info')->group(function() {
        Route::get('/{user_id}', [Controllers\BillingInfoController::class, 'getUserBillingInfo']);
    });
});

