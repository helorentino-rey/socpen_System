<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MothersMaidenName extends Model
{
    use HasFactory;

    
    protected $table = 'date_of_birth';
    protected $fillable = [
        'beneficiary_id',
        'mother_last_name',
        'mother_first_name',
        'mother_middle_name',
        'date_of_birth',
        'place_of_birth_city',
        'place_of_birth_province',
        'age',
        'sex',
        'civil_status',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
