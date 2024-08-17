<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'employee_id',
        'password',
        'assigned_province',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
