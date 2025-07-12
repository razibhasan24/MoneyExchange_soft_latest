<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('pages.Home.dashboard');
});

Route::resource('currencies', App\Http\Controllers\CurrencyController::class);
Route::resource('customers', App\Http\Controllers\CustomerController::class);
Route::resource('exchange_rates', App\Http\Controllers\ExchangeRateController::class);
Route::resource('transactions', App\Http\Controllers\TransactionController::class);
Route::resource('payments', App\Http\Controllers\PaymentController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('invoices', App\Http\Controllers\InvoiceController::class);
Route::resource('invoice_details', App\Http\Controllers\InvoiceDetailController::class);
Route::resource('purchases', App\Http\Controllers\PurchaseController::class);
Route::resource('purchase_details', App\Http\Controllers\PurchaseDetailController::class);
Route::resource('money_stocks', App\Http\Controllers\MoneyStockController::class);
Route::resource('money_stock_adjustment_types', App\Http\Controllers\MoneyStockAdjustmentTypeController::class);
Route::resource('money_stock_adjustments', App\Http\Controllers\MoneyStockAdjustmentController::class);
Route::resource('money_stock_adjustment_details', App\Http\Controllers\MoneyStockAdjustmentDetailController::class);
Route::resource('statuses', App\Http\Controllers\StatusController::class);
Route::resource('money_receipts', App\Http\Controllers\MoneyReceiptController::class);
