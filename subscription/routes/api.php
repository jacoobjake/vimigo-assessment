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

Route::get('products', [Controllers\ProductController::class, 'list']);
Route::get('user-subscription/{user_id}', [Controllers\SubscriptionController::class, 'getByUser']);
Route::post('subscribe', [Controllers\SubscriptionController::class, 'subscribe']);