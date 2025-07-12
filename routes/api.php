<?php

use App\Http\Controllers\Api\Purchase\PurchasesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('purchases',PurchasesController::class);