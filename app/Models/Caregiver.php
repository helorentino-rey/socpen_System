<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caregiver extends Model
{
    use HasFactory;

    protected $table = 'caregivers';

    protected $fillable = [
        'beneficiary_id',
        'caregiver_last_name',
        'caregiver_first_name',
        'caregiver_middle_name',
        'caregiver_name_extension',
        'caregiver_relationship',
        'caregiver_contact',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
