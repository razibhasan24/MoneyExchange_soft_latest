<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['transaction_id', 'payment_method', 'payment_reference', 'payment_date', 'payment_document'];

    public $timestamps = false; // Disable timestamps

}