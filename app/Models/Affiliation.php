<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    use HasFactory;

    protected $table = 'affiliations';

    protected $fillable = [
        'beneficiary_id',
        'affiliation_type',
        'hh_id',
        'indigenous_specify',
    ];

    /**
     * Get the beneficiary that owns the affiliation.
     */
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
