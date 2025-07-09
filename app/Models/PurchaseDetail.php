<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable = ['purchase_id', 'item_description', 'quantity', 'unit_price', 'total_price'];

    public $timestamps = false; // Disable timestamps

}