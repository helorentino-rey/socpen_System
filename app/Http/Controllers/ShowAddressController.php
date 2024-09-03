<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Province;
use App\Models\CityMuni;
use App\Models\Barangay;
use Illuminate\Http\Request;

class ShowAddressController extends Controller
{
    public function getProvinces(Request $request)
    {
        $provinces = Province::where('region_psgc', $request->region_psgc)->orderBy('col_province', 'asc')->get();
        return response()->json($provinces->map(function ($province) {
            return '<option value="' . $province->psgc . '">' . $province->col_province . '</option>';
        })->implode(''));
    }

    public function getCities(Request $request)
    {
        $cities = CityMuni::where('province_psgc', $request->province_psgc)->orderBy('col_citymuni', 'asc')->get();
        return response()->json($cities->map(function ($city) {
            return '<option value="' . $city->psgc . '">' . $city->col_citymuni . '</option>';
        })->implode(''));
    }

    public function getBarangays(Request $request)
    {
        $barangays = Barangay::where('city_psgc', $request->city_psgc)->orderBy('col_brgy', 'asc')->get();
        return response()->json($barangays->map(function ($barangay) {
            return '<option value="' . $barangay->psgc . '">' . $barangay->col_brgy . '</option>';
        })->implode(''));
    }
}
