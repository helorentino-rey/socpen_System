<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'employee_id',
        'password',
        // 'name',
        // 'email',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
