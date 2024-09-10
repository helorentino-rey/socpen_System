<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomicInformation extends Model
{
    use HasFactory;

    protected $table = 'economic_information';

    protected $fillable = [
        'beneficiary_id',
        'receiving_pension',
        'pension_amount',
        'pension_source',
        'permanent_income',
        'income_amount',
        'income_source',
        'regular_support',
        'support_amount',
        'support_source',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}