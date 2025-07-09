<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'id_type', 'id_number', 'phone', 'address', 'id_proof_document', 'created_at'];

    public $timestamps = false; // Disable timestamps

}