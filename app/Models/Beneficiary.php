<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;
    
    protected $table = 'beneficiary';
    
    protected $fillable = [
        'osca_id',
        'ncsc_rrn',
        'profile_upload',
    ];
}
