<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $table = 'children';

    protected $fillable = [
        'beneficiary_id',
        'children_name',
        'children_civil_status',
        'children_occupation',
        'children_income',
        'children_contact_number',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}