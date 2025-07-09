<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['username', 'password_hash', 'full_name', 'role', 'created_at'];

    public $timestamps = false; // Disable timestamps

}