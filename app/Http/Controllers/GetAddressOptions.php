<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class getAddressOptions extends Controller
{
public function getProvincesByRegion($regionId)
{
    $provinces = Province::where('region_id', $regionId)->get();
    return response()->json($provinces);
}

public function getCitiesByProvince($provinceId)
{
    $cities = City::where('province_id', $provinceId)->get();
    return response()->json($cities);
}

public function getBarangaysByCity($cityId)
{
    $barangays = Barangay::where('city_id', $cityId)->get();
    return response()->json($barangays);
}

public function getHousesByBarangay($barangayId)
{
    $houses = House::where('barangay_id', $barangayId)->get();
    return response()->json($houses);
}

}

}
