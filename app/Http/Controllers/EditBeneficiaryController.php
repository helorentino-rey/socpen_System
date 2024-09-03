<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\BeneficiaryInfo;
use App\Models\Address;
use App\Models\MothersMaidenName;
use App\Models\Child;
use App\Models\Region;
use App\Models\Province;
use App\Models\CityMuni;
use App\Models\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EditBeneficiaryController extends Controller
{
    public function edit($id)
    {
        $beneficiary = Beneficiary::with([
            'addresses',
            'affiliation',
            'assessmentRecommendation',
            'beneficiaryInfo',
            'caregiver',
            'child',
            'economicInformation',
            'healthInformation',
            'housingLivingStatus',
            'mothersMaidenName',
            'representative',
            'spouse',
        ])->find($id);

        if (!$beneficiary) {
            return redirect()->route('superadmin.beneficiaries.list')->with('error', 'Beneficiary not found.');
        }

        return view('layouts.edit', compact('beneficiary'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'osca_id' => 'required|string|unique:beneficiary,osca_id,' . $id,
            'ncsc_rrn' => 'nullable|integer',
            'profile_upload' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',

            'last_name' => 'required|string|max:20',
            'first_name' => 'required|string|max:20',
            'middle_name' => 'nullable|string|max:20',
            'name_extension' => 'required|string|max:4',

            'mother_last_name' => 'required|string|max:25',
            'mother_first_name' => 'required|string|max:25',
            'mother_middle_name' => 'nullable|string|max:25',
            'date_of_birth' => 'required|date',
            'place_of_birth_city' => 'required|string|max:25',
            'place_of_birth_province' => 'required|string|max:25',
            'age' => 'required|integer|min:0',
            'sex' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Widowed,Separated',

            // Address validation
            'permanent_address_region' => 'required|string|max:50',
            'permanent_address_province' => 'required|string|max:50',
            'permanent_address_city' => 'required|string|max:50',
            'permanent_address_barangay' => 'required|string|max:50',
            'permanent_address_sitio' => 'required|string|max:50',

            'present_address_region' => 'required|string|max:50',
            'present_address_province' => 'required|string|max:50',
            'present_address_city' => 'required|string|max:50',
            'present_address_barangay' => 'required|string|max:50',
            'present_address_sitio' => 'required|string|max:50',

            'affiliation' => 'nullable|array',
            'affiliation.*' => 'in:Listahanan,Pantawid Beneficiary,Indigenous People',
            'hh_id' => 'nullable|string|max:25',
            'indigenous_specify' => 'nullable|string|max:30',

            'spouse_last_name' => 'required|string|max:20',
            'spouse_first_name' => 'required|string|max:20',
            'spouse_middle_name' => 'nullable|string|max:20',
            'spouse_name_extension' => 'required|string|max:4',

            'spouse_address_region' => 'required|string|max:20',
            'spouse_address_province' => 'required|string|max:20',
            'spouse_address_city' => 'required|string|max:20',
            'spouse_address_barangay' => 'required|string|max:20',
            'spouse_address_sitio' => 'required|string|max:30',


            'children' => 'present|array',
            'children.*.name' => 'nullable|string|max:50',
            'children.*.civil_status' => 'nullable|in:Single,Married,Divorced,Widowed',
            'children.*.occupation' => 'nullable|string|max:50',
            'children.*.income' => 'nullable|string|max:10',
            'children.*.contact_number' => 'nullable|string|max:13',
            // Add other validation rules as needed
        ]);

        // Find the beneficiary by ID
        $beneficiary = Beneficiary::with([
            'addresses',
            'affiliation',
            'assessmentRecommendation',
            'beneficiaryInfo',
            'caregiver',
            'child',
            'economicInformation',
            'healthInformation',
            'housingLivingStatus',
            'mothersMaidenName',
            'representative',
            'spouse',
        ])->findOrFail($id);

        if (!$beneficiary) {
            return redirect()->route('superadmin.beneficiaries.list')->with('error', 'Beneficiary not found.');
        }

        // Handle profile picture upload
        if ($request->hasFile('profile_upload')) {
            $file = $request->file('profile_upload');
            $filePath = $file->store('profile_pictures', 'public');
            $validatedData['profile_upload'] = $filePath;
        }

        // Fetch region, province, city, and barangay names using PSGC codes
        $permanent_region_name = Region::where('psgc', $request->input('permanent_address_region'))->value('col_region');
        $permanent_province_name = Province::where('psgc', $request->input('permanent_address_province'))->value('col_province');
        $permanent_city_name = CityMuni::where('psgc', $request->input('permanent_address_city'))->value('col_citymuni');
        $permanent_barangay_name = Barangay::where('psgc', $request->input('permanent_address_barangay'))->value('col_brgy');

        $present_region_name = Region::where('psgc', $request->input('present_address_region'))->value('col_region');
        $present_province_name = Province::where('psgc', $request->input('present_address_province'))->value('col_province');
        $present_city_name = CityMuni::where('psgc', $request->input('present_address_city'))->value('col_citymuni');
        $present_barangay_name = Barangay::where('psgc', $request->input('present_address_barangay'))->value('col_brgy');

        $spouse_region_name = Region::where('psgc', $request->input('spouse_address_region'))->value('col_region');
        $spouse_province_name = Province::where('psgc', $request->input('spouse_address_province'))->value('col_province');
        $spouse_city_name = CityMuni::where('psgc', $request->input('spouse_address_city'))->value('col_citymuni');
        $spouse_barangay_name = Barangay::where('psgc', $request->input('spouse_address_barangay'))->value('col_brgy');


        // Update the beneficiary's data
        $beneficiaryData = [
            'osca_id' => $validatedData['osca_id'],
            'ncsc_rrn' => $validatedData['ncsc_rrn'],
        ];

        if (isset($validatedData['profile_upload'])) {
            $beneficiaryData['profile_upload'] = $validatedData['profile_upload'];
        }

        $beneficiary->update($beneficiaryData);
        Log::info('Beneficiary updated: ' . $beneficiary->id);

        // Update or create beneficiary info record
        BeneficiaryInfo::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'last_name' => $validatedData['last_name'],
                'first_name' => $validatedData['first_name'],
                'middle_name' => $validatedData['middle_name'] ?? null,
                'name_extension' => $validatedData['name_extension'],
            ]
        );
        Log::info('Beneficiary info updated for beneficiary: ' . $beneficiary->id);


        // Update or create permanent address with names
        Address::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id, 'type' => 'permanent'],
            [
                'region' => $permanent_region_name,
                'province' => $permanent_province_name,
                'city' => $permanent_city_name,
                'barangay' => $permanent_barangay_name,
                'sitio' => $validatedData['permanent_address_sitio'],
            ]
        );
        Log::info('Permanent address updated for beneficiary: ' . $beneficiary->id);

        // Update or create present address with names
        Address::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id, 'type' => 'present'],
            [
                'region' => $present_region_name,
                'province' => $present_province_name,
                'city' => $present_city_name,
                'barangay' => $present_barangay_name,
                'sitio' => $validatedData['present_address_sitio'],
            ]
        );
        Log::info('Present address updated for beneficiary: ' . $beneficiary->id);

        // Update or create spouse address with names
        Address::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id, 'type' => 'spouse_address'],
            [
                'region' => $spouse_region_name,
                'province' => $spouse_province_name,
                'city' => $spouse_city_name,
                'barangay' => $spouse_barangay_name,
                'sitio' => $validatedData['spouse_address_sitio'],
            ]
        );
        Log::info('Spouse address updated for beneficiary: ' . $beneficiary->id);


        // Update or create mother's maiden name record
        MothersMaidenName::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'mother_last_name' => $validatedData['mother_last_name'],
                'mother_first_name' => $validatedData['mother_first_name'],
                'mother_middle_name' => $validatedData['mother_middle_name'] ?? null,
                'date_of_birth' => $validatedData['date_of_birth'],
                'place_of_birth_city' => $validatedData['place_of_birth_city'],
                'place_of_birth_province' => $validatedData['place_of_birth_province'],
                'age' => $validatedData['age'],
                'sex' => $validatedData['sex'],
                'civil_status' => $validatedData['civil_status'],
            ]
        );
        Log::info('Mother\'s maiden name updated for beneficiary: ' . $beneficiary->id);

        // Update or create affiliation record
        $beneficiary->affiliation()->updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'affiliation_type' => implode(',', $validatedData['affiliation'] ?? []),
                'hh_id' => $validatedData['hh_id'] ?? null,
                'indigenous_specify' => $validatedData['indigenous_specify'] ?? null,
            ]
        );
        Log::info('Affiliation updated for beneficiary: ' . $beneficiary->id);

        // Update or create spouse record
        $beneficiary->spouse()->updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'spouse_last_name' => $validatedData['spouse_last_name'],
                'spouse_first_name' => $validatedData['spouse_first_name'],
                'spouse_middle_name' => $validatedData['spouse_middle_name'] ?? null,
                'spouse_name_extension' => $validatedData['spouse_name_extension'],
            ]
        );
        Log::info('Spouse updated for beneficiary: ' . $beneficiary->id);

        // Handle children update or deletion
        if ($request->has('children')) {
            foreach ($request->input('children') as $childData) {
                if (isset($childData['delete']) && $childData['delete'] == '1') {
                    if (isset($childData['id'])) {
                        // Delete the child record from the database
                        Child::where('id', $childData['id'])->delete();
                    }
                } else {
                    if (isset($childData['id'])) {
                        // Update existing child record
                        $child = Child::findOrFail($childData['id']);
                        $child->update([
                            'children_name' => $childData['name'],
                            'children_civil_status' => $childData['civil_status'],
                            'children_occupation' => $childData['occupation'],
                            'children_income' => $childData['income'],
                            'children_contact_number' => $childData['contact_number'],
                        ]);
                    } else {
                        // Create a new child record
                        $beneficiary->child()->create([
                            'children_name' => $childData['name'],
                            'children_civil_status' => $childData['civil_status'],
                            'children_occupation' => $childData['occupation'],
                            'children_income' => $childData['income'],
                            'children_contact_number' => $childData['contact_number'],
                        ]);
                    }
                }
            }
        }
        Log::info('Children updated for beneficiary: ' . $beneficiary->id);

        // Redirect back with a success message
        return redirect()->route('layouts.edit', $id)->with('success', 'Beneficiary updated successfully.');
    }
}
