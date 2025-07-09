<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['supplier_name', 'purchase_date', 'total_amount', 'status'];

    public $timestamps = false; // Disable timestamps

}