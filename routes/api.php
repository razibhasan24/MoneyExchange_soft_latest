<?php

use App\Http\Controllers\Api\Purchase\PurchasesController;
use App\Http\Controllers\api\Receipts\MoneyReciptsController;
use App\Models\MoneyStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('purchases',PurchasesController::class);
Route::apiResource('money_receipts',MoneyReciptsController::class);
