<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['supplier_name', 'contact_person', 'phone_number', 'email', 'address', 'country'];

    public $timestamps = false; // Disable timestamps

}