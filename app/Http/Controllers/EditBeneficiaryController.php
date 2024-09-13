<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\BeneficiaryInfo;
use App\Models\Address;
use App\Models\MothersMaidenName;
use App\Models\Child;
use App\Models\Representative;
use App\Models\AssessmentRecommendation;
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
            'spouse_contact' => 'nullable|string|max:13',

            'spouse_address_region' => 'required|string|max:20',
            'spouse_address_province' => 'required|string|max:20',
            'spouse_address_city' => 'required|string|max:20',
            'spouse_address_barangay' => 'required|string|max:20',
            'spouse_address_sitio' => 'required|string|max:30',


            'children' => 'present|array',
            'children.*.name' => 'nullable|string|max:50',
            'children.*.civil_status' => 'nullable|in:Single,Married,Widowed,Separated',
            'children.*.occupation' => 'nullable|string|max:50',
            'children.*.income' => 'nullable|string|max:10',
            'children.*.contact_number' => 'nullable|string|max:13',

            'representatives' => 'present|array',
            'representatives.*.name' => 'nullable|string|max:50',
            'representatives.*.relationship' => 'nullable|string|max:50',
            'representatives.*.contact_number' => 'nullable|string|max:13',

            'house_status' => 'required|array',
            'house_status.*' => 'required|string|in:Owned,Rent,Others',
            'house_status_others_input' => 'nullable|string',
            'living_status' => 'required|array',
            'living_status.*' => 'required|string|in:Living Alone,Living with spouse,Living with children,Others',
            'living_status_others_input' => 'nullable|string',

            'receiving_pension' => 'required|in:Yes,No',
            'pension_amount' => 'nullable|string|max:10',
            'pension_source' => 'nullable|string|max:30',
            'permanent_income' => 'required|in:Yes,No',
            'income_amount' => 'nullable|string|max:10',
            'income_source' => 'nullable|string|max:30',
            'regular_support' => 'required|in:Yes,No',
            'support_amount' => 'nullable|string|max:10',
            'support_source' => 'nullable|string|max:30',

            'existing_illness' => 'required|in:Yes,None',
            'illness_specify' => 'nullable|string|max:30',
            'with_disability' => 'required|in:Yes,None',
            'disability_specify' => 'nullable|string|max:30',
            'difficult_adl' => 'required|in:Yes,No',
            'dependent_iadl' => 'required|in:Yes,No',
            'experience_loss' => 'required|in:Yes,No',

            'remarks' => 'nullable|string|max:200',
            'eligibility' => 'nullable|in:Eligible,Not Eligible',
        ]);

        // Find the beneficiary by ID
        $beneficiary = Beneficiary::with([
            'addresses',
            'affiliation',
            'assessmentRecommendation',
            'beneficiaryInfo',
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
                'spouse_contact' => $validatedData['spouse_contact'] ?? null,
            ]
        );
        Log::info('Spouse updated for beneficiary: ' . $beneficiary->id);

        // Handle children update or deletion
        // Delete all existing children for the beneficiary
        $beneficiary->child()->delete();

        // Insert the new or updated children
        foreach ($validatedData['children'] as $childData) {
            $beneficiary->child()->create([
                'children_name' => $childData['name'] ?? null,
                'children_civil_status' => $childData['civil_status'] ?? null,
                'children_occupation' => $childData['occupation'] ?? null,
                'children_income' => $childData['income'] ?? null,
                'children_contact_number' => $childData['contact_number'] ?? null,
            ]);
        }
        Log::info('Children updated for beneficiary: ' . $beneficiary->id);

        // Handle representatives update or deletion
        // Delete all existing representatives for the beneficiary
        $beneficiary->representative()->delete();

        // Insert the new or updated representatives
        foreach ($validatedData['representatives'] as $representativeData) {
            $beneficiary->representative()->create([
                'representative_name' => $representativeData['name'] ?? null,
                'representative_relationship' => $representativeData['relationship'] ?? null,
                'representative_contact_number' => $representativeData['contact_number'] ?? null,
            ]);
        }
        Log::info('Representatives updated for beneficiary: ' . $beneficiary->id);


        // Handle "Others" fields for house and living status
        $houseStatusOthersInput = in_array('Others', $validatedData['house_status']) ? $validatedData['house_status_others_input'] : null;
        $livingStatusOthersInput = in_array('Others', $validatedData['living_status']) ? $validatedData['living_status_others_input'] : null;

        // Update or create housing and living status
        $beneficiary->housingLivingStatus()->updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'house_status' => implode(',', $validatedData['house_status']),
                'house_status_others_input' => $houseStatusOthersInput,
                'living_status' => implode(',', $validatedData['living_status']),
                'living_status_others_input' => $livingStatusOthersInput,
            ]
        );
        Log::info('Housing and living status updated for beneficiary: ' . $beneficiary->id);

        // Update or create economic information
        // Clear fields if "No" is selected
        if ($validatedData['receiving_pension'] == 'No') {
            $validatedData['pension_amount'] = null;
            $validatedData['pension_source'] = null;
        }
        if ($validatedData['permanent_income'] == 'No') {
            $validatedData['income_amount'] = null;
            $validatedData['income_source'] = null;
        }
        if ($validatedData['regular_support'] == 'No') {
            $validatedData['support_amount'] = null;
            $validatedData['support_source'] = null;
        }

        // Update the beneficiary's economic information
        $beneficiary->economicInformation->update([
            'receiving_pension' => $validatedData['receiving_pension'],
            'pension_amount' => $validatedData['pension_amount'],
            'pension_source' => $validatedData['pension_source'],
            'permanent_income' => $validatedData['permanent_income'],
            'income_amount' => $validatedData['income_amount'],
            'income_source' => $validatedData['income_source'],
            'regular_support' => $validatedData['regular_support'],
            'support_amount' => $validatedData['support_amount'],
            'support_source' => $validatedData['support_source'],
        ]);
        Log::info('Economic information updated for beneficiary: ' . $beneficiary->id);

        // Update or create health information  
        if ($request->has('existing_illness')) {
            $beneficiary->healthInformation->existing_illness = $request->input('existing_illness');
            $beneficiary->healthInformation->illness_specify = $request->input('existing_illness') == 'Yes' ? $request->input('illness_specify') : null;
        }

        if ($request->has('with_disability')) {
            $beneficiary->healthInformation->with_disability = $request->input('with_disability');
            $beneficiary->healthInformation->disability_specify = $request->input('with_disability') == 'Yes' ? $request->input('disability_specify') : null;
        }

        if ($request->has('difficult_adl')) {
            $beneficiary->healthInformation->difficult_adl = $request->input('difficult_adl');
        }

        if ($request->has('dependent_iadl')) {
            $beneficiary->healthInformation->dependent_iadl = $request->input('dependent_iadl');
        }

        if ($request->has('experience_loss')) {
            $beneficiary->healthInformation->experience_loss = $request->input('experience_loss');
        }

        $beneficiary->healthInformation->save();

        Log::info('Health information updated for beneficiary: ' . $beneficiary->id);

        // Ensure 'eligibility' is set in $validatedData
        $validatedData['eligibility'] = $validatedData['eligibility'] ?? null;

        // Update or create assessment recommendation record
        AssessmentRecommendation::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'remarks' => $validatedData['remarks'],
                'eligibility' => $validatedData['eligibility'],
            ]
        );
        Log::info('Assessment recommendation updated for beneficiary: ' . $beneficiary->id);

        // Redirect back with a success message
        return redirect()->route('layouts.file', $id)->with('success', 'Beneficiary updated successfully.');
    }
}
