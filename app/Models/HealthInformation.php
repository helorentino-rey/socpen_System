<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthInformation extends Model
{
    use HasFactory;

    protected $table = 'health_information';

    protected $fillable = [
        'beneficiary_id',
        'existing_illness',
        'illness_specify',
        'with_disability',
        'disability_specify',
        'difficult_adl',
        'dependent_iadl',
        'experience_loss',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}