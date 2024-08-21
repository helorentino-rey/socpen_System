<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Province;
use App\Models\CityMuni;
use App\Models\Barangay;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getRegions()
    {
        return response()->json(Region::all());
    }

    public function getProvinces($region_psgc)
    {
        return response()->json(Province::where('region_psgc', $region_psgc)->get());
    }

    public function getCities($province_psgc)
    {
        return response()->json(CityMuni::where('province_psgc', $province_psgc)->get());
    }

    public function getBarangays($citymuni_psgc)
    {
        return response()->json(Barangay::where('citymuni_psgc', $citymuni_psgc)->get());
    }

    public function create()
    {
        $regions = Region::all();
        $provinces = Province::all();
        $cities = CityMuni::all();
        $barangays = Barangay::all();

        return view('layouts.add', compact('regions', 'provinces', 'cities', 'barangays'));
    }
}
