<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('orders', [\App\Http\Controllers\Api\OrderController::class,'index']);
Route::post('orders/create', [\App\Http\Controllers\Api\OrderController::class,'create']);
Route::get('commissions/', [\App\Http\Controllers\Api\CommissionController::class,'index']);
