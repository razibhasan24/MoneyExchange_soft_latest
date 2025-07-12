<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyReceipt extends Model
{
    protected $fillable = ['receipt_number', 'transaction_id', 'customer_id', 'agent_id', 'total_amount', 'payment_method', 'status', 'issued_by', 'issued_date', 'notes', 'created_at', 'updated_at'];


}