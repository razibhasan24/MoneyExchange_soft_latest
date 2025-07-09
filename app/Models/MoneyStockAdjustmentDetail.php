<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyStockAdjustmentDetail extends Model
{
    protected $fillable = ['adjustment_id', 'currency_id', 'quantity'];

    public $timestamps = false; // Disable timestamps

}