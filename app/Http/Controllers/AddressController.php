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

    public function getProvinces($regionPsgc)
    {
        return response()->json(Province::where('region_psgc', $regionPsgc)->get());
    }

    public function getCities($provincePsgc)
    {
        $cities = CityMuni::where('province_psgc', $provincePsgc)->get();
        return response()->json($cities);
    }

    public function getBarangays($cityMuniPsgc)
    {
        return response()->json(Barangay::where('citymuni_psgc', $cityMuniPsgc)->get());
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
