<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $table = 'tbl_brgy';
    protected $primaryKey = 'psgc';
    public $timestamps = false;

    public function cityMuni()
    {
        return $this->belongsTo(CityMuni::class, 'citymuni_psgc', 'psgc');
    }
}
