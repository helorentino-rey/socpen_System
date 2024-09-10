<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentRecommendation extends Model
{
    use HasFactory;

    protected $table = 'assessment_recommendation';

    protected $fillable = [
        'beneficiary_id',
        'remarks',
        'eligibility',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}