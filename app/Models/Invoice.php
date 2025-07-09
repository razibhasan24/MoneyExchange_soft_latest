<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['customer_id', 'invoice_date', 'total_amount', 'status'];

    public $timestamps = false; // Disable timestamps

}