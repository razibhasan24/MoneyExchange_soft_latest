<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyReceiptDetail extends Model
{
    protected $fillable = ['receipt_id', 'currency_code', 'amount', 'exchange_rate', 'equivalent_amount', 'fee', 'type', 'created_at'];

    public $timestamps = false; // Disable timestamps

}