<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingLivingStatus extends Model
{
    use HasFactory;

    protected $table = 'housing_living_status';

    protected $fillable = [
        'beneficiary_id',
        'house_status',
        'house_status_others_input',
        'living_status',
        'living_status_others_input',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
