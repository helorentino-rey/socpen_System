<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'tbl_province';
    protected $primaryKey = 'psgc';
    public $timestamps = false;

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_psgc', 'psgc');
    }
}
