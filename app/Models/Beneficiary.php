<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $table = 'beneficiary';

    protected $fillable = [
        'osca_id',
        'ncsc_rrn',
        'profile_upload',
        'status'
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class)->whereIn('type', ['present', 'permanent', 'spouse_address']);
    }
    
    public function permanentAddress()
    {
        return $this->hasOne(Address::class)->where('type', 'permanent');
    }

    public function presentAddress()
    {
        return $this->hasOne(Address::class)->where('type', 'present');
    }

    public function spouseAddress()
    {
        return $this->hasOne(Address::class)->where('type', 'spouse_address');
    }

    public function affiliation()
    {
        return $this->hasOne(Affiliation::class);
    }

    public function assessmentRecommendation()
    {
        return $this->hasOne(AssessmentRecommendation::class);
    }

    public function beneficiaryInfo()
    {
        return $this->hasOne(BeneficiaryInfo::class);
    }

    public function child()
    {
        return $this->hasMany(Child::class);
    }

    public function economicInformation()
    {
        return $this->hasOne(EconomicInformation::class);
    }

    public function healthInformation()
    {
        return $this->hasOne(HealthInformation::class);
    }

    public function housingLivingStatus()
    {
        return $this->hasOne(HousingLivingStatus::class);
    }

    public function mothersMaidenName()
    {
        return $this->hasOne(MothersMaidenName::class);
    }

    public function representative()
    {
        return $this->hasMany(Representative::class);
    }

    public function spouse()
    {
        return $this->hasOne(Spouse::class);
    }
}
