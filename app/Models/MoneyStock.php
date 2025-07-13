<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyStock extends Model
{
    protected $fillable = ['customer_id', 'agent_id', 'currency_code', 'currency_name', 'availabel_amount', 'transaction_type', 'payment_method', 'remarks', 'created_at', 'updated_at'];


}