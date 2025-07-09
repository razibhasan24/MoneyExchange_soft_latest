<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['customer_id', 'currency_from', 'currency_to', 'amount_from', 'amount_to', 'rate', 'transaction_date', 'agent_id', 'remarks', 'receipt_document'];

    public $timestamps = false; // Disable timestamps

}