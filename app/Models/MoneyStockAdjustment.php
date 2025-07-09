<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyStockAdjustment extends Model
{
    protected $fillable = ['adjustment_type_id', 'adjustment_date', 'remarks'];

    public $timestamps = false; // Disable timestamps

}