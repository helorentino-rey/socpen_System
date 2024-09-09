<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    use HasFactory;

    protected $table = 'spouses';

    protected $fillable = [
        'beneficiary_id',
        'spouse_last_name',
        'spouse_first_name',
        'spouse_middle_name',
        'spouse_name_extension',
        'spouse_contact',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}