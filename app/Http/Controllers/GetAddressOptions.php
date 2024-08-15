<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class getAddressOptions extends Controller
{
    // Controller Example
public function getPresentAddressOptions()
{
    $houses = House::all(); // Fetch from the houses table
    $barangays = Barangay::all(); // Fetch from the barangays table
    $cities = City::all(); // Fetch from the cities table
    $provinces = Province::all(); // Fetch from the provinces table
    $regions = Region::all(); // Fetch from the regions table

    return response()->json([
        'houses' => $houses,
        'barangays' => $barangays,
        'cities' => $cities,
        'provinces' => $provinces,
        'regions' => $regions,
    ]);
}

}
