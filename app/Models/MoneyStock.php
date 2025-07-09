<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyStock extends Model
{
    protected $fillable = ['currency_id', 'quantity', 'updated_at'];

    public $timestamps = false; // Disable timestamps

}