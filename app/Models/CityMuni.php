<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityMuni extends Model
{
    protected $table = 'tbl_citymuni';
    protected $primaryKey = 'psgc';
    public $timestamps = false;

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_psgc', 'psgc');
    }
}
