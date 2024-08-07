<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'lastname', 'firstname', 'middlename', 'name_extension', 'sex', 'birthday', 'age',
        'marital_status', 'contact_number', 'address', 'employee_id', 'email', 'password',
        'assigned_province', 'profile_picture'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'birthday' => 'date',
    ];
}
