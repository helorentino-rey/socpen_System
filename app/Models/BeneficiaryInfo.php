<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaryInfo extends Model
{
    use HasFactory;

    protected $table = 'beneficiary_info';

    protected $fillable = [
        // 'beneficiary_id',
        'last_name',
        'first_name',
        'middle_name',
        'name_extension',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}