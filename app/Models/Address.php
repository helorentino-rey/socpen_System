<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'beneficiary_id',
        'region',
        'province',
        'city',
        'barangay',
        'sitio',
        'type',
    ];

    // Define the relationship with the Beneficiary model
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}