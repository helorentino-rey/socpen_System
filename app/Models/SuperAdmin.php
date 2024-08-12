<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuperAdmin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    // You can add more custom methods or attributes here if needed
}