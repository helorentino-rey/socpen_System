<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    use HasFactory;

    protected $table = 'representatives';

    protected $fillable = [
        'beneficiary_id',
        'representative_name',
        'representative_civil_status',
        'representative_contact_number',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}