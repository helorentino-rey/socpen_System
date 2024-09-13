<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\BeneficiaryInfo;
use App\Models\Address;
use App\Models\MothersMaidenName;
use App\Models\Affiliation;
use App\Models\Region;
use App\Models\Province;
use App\Models\CityMuni;
use App\Models\Barangay;
use App\Models\Spouse;
use App\Models\Child;
use App\Models\Representative;
use App\Models\Caregiver;
use App\Models\HousingLivingStatus;
use App\Models\EconomicInformation;
use App\Models\HealthInformation;
use App\Models\AssessmentRecommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddBeneficiaryController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'osca_id' => 'required|string|unique:beneficiary,osca_id',
            'ncsc_rrn' => 'nullable|integer',
            'profile_upload' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',

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

        // Handle file upload
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

        // Create a new beneficiary record
        $beneficiary = Beneficiary::create([
            'osca_id' => $validatedData['osca_id'],
            'ncsc_rrn' => $validatedData['ncsc_rrn'],
            'profile_upload' => $validatedData['profile_upload'],
        ]);
        Log::info('Beneficiary created: ' . $beneficiary->id);

        // Create a new beneficiary info record
        BeneficiaryInfo::create([
            'beneficiary_id' => $beneficiary->id,
            'last_name' => $validatedData['last_name'],
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'] ?? null,
            'name_extension' => $validatedData['name_extension'],
        ]);
        Log::info('Beneficiary info created for beneficiary: ' . $beneficiary->id);

        // Save permanent address with names
        Address::create([
            'beneficiary_id' => $beneficiary->id,
            'region' => $permanent_region_name,
            'province' => $permanent_province_name,
            'city' => $permanent_city_name,
            'barangay' => $permanent_barangay_name,
            'sitio' => $validatedData['permanent_address_sitio'],
            'type' => 'permanent',
        ]);
        Log::info('Permanent address created for beneficiary: ' . $beneficiary->id);

        // Save present address with names
        Address::create([
            'beneficiary_id' => $beneficiary->id,
            'region' => $present_region_name,
            'province' => $present_province_name,
            'city' => $present_city_name,
            'barangay' => $present_barangay_name,
            'sitio' => $validatedData['present_address_sitio'],
            'type' => 'present',
        ]);
        Log::info('Present address created for beneficiary: ' . $beneficiary->id);

        // Save spouse address with names
        Address::create([
            'beneficiary_id' => $beneficiary->id,
            'region' => $spouse_region_name,
            'province' => $spouse_province_name,
            'city' => $spouse_city_name,
            'barangay' => $spouse_barangay_name,
            'sitio' => $validatedData['spouse_address_sitio'],
            'type' => 'spouse_address',
        ]);
        Log::info('Spouse address created for beneficiary: ' . $beneficiary->id);

        // Create a new mother's maiden name record
        MothersMaidenName::create([
            'beneficiary_id' => $beneficiary->id,
            'mother_last_name' =>  $validatedData['mother_last_name'],
            'mother_first_name' =>  $validatedData['mother_first_name'],
            'mother_middle_name' =>  $validatedData['mother_middle_name'] ?? null,
            'date_of_birth' => $validatedData['date_of_birth'],
            'place_of_birth_city' => $validatedData['place_of_birth_city'],
            'place_of_birth_province' => $validatedData['place_of_birth_province'],
            'age' => $validatedData['age'],
            'sex' => $validatedData['sex'],
            'civil_status' => $validatedData['civil_status'],
        ]);
        Log::info('Mother\'s maiden name created for beneficiary: ' . $beneficiary->id);

        // Concatenate the selected affiliations into a comma-separated string
        $affiliationTypeString = implode(', ', $validatedData['affiliation']);

        // Save the affiliation data
        Affiliation::create([
            'beneficiary_id' => $beneficiary->id,
            'affiliation_type' => $affiliationTypeString,
            'hh_id' => $validatedData['hh_id'] ?? null,
            'indigenous_specify' => $validatedData['indigenous_specify'] ?? null,
        ]);

        Log::info('Affiliation created for beneficiary: ' . $beneficiary->id . ' with types: ' . $affiliationTypeString);

        // Create a new spouse record
        Spouse::create([
            'beneficiary_id' => $beneficiary->id,
            'spouse_last_name' => $validatedData['spouse_last_name'],
            'spouse_first_name' => $validatedData['spouse_first_name'],
            'spouse_middle_name' => $validatedData['spouse_middle_name'] ?? null,
            'spouse_name_extension' => $validatedData['spouse_name_extension'],
            'spouse_contact' => $validatedData['spouse_contact'] ?? null,
        ]);
        Log::info('Spouse created for beneficiary: ' . $beneficiary->id);

        // Create a new child record
        Log::info('Validated Data: ', $validatedData);

        // Create a new child record
        if (isset($validatedData['children']) && is_array($validatedData['children'])) {
            foreach ($validatedData['children'] as $childData) {
                Child::create([
                    'beneficiary_id' => $beneficiary->id,
                    'children_name' => $childData['name'] ?? null,
                    'children_civil_status' => $childData['civil_status'] ?? null,
                    'children_occupation' => $childData['occupation'] ?? null,
                    'children_income' => $childData['income'] ?? null,
                    'children_contact_number' => $childData['contact_number'] ?? null,
                ]);
                Log::info('Child created for beneficiary: ' . $beneficiary->id);
            }
        }

        // Create a new representative record
        if (isset($validatedData['representatives']) && is_array($validatedData['representatives'])) {
            foreach ($validatedData['representatives'] as $representativeData) {
                Representative::create([
                    'beneficiary_id' => $beneficiary->id,
                    'representative_name' => $representativeData['name'] ?? null,
                    'representative_relationship' => $representativeData['relationship'] ?? null,
                    'representative_contact_number' => $representativeData['contact_number'] ?? null,
                ]);
                Log::info('Representative created for beneficiary: ' . $beneficiary->id);
            }
        }

        // Process the checkbox values
        $houseStatus = implode(', ', $validatedData['house_status']);
        $livingStatus = implode(', ', $validatedData['living_status']);

        // Create a new housing living status record
        HousingLivingStatus::create([
            'beneficiary_id' => $beneficiary->id,
            'house_status' => $houseStatus,
            'house_status_others_input' => $validatedData['house_status_others_input'] ?? null,
            'living_status' => $livingStatus,
            'living_status_others_input' => $validatedData['living_status_others_input'] ?? null,
        ]);

        Log::info('Housing living status created for beneficiary: ' . $beneficiary->id);

        //Economic Information
        EconomicInformation::create([
            'beneficiary_id' => $beneficiary->id,
            'receiving_pension' => $validatedData['receiving_pension'],
            'pension_amount' => $validatedData['pension_amount'] ?? null,
            'pension_source' => $validatedData['pension_source'] ?? null,
            'permanent_income' => $validatedData['permanent_income'],
            'income_amount' => $validatedData['income_amount'] ?? null,
            'income_source' => $validatedData['income_source'] ?? null,
            'regular_support' => $validatedData['regular_support'],
            'support_amount' => $validatedData['support_amount'] ?? null,
            'support_source' => $validatedData['support_source'] ?? null,
        ]);

        Log::info('Economic information created for beneficiary: ' . $beneficiary->id);

        //Health Information
        HealthInformation::create([
            'beneficiary_id' => $beneficiary->id,
            'existing_illness' => $validatedData['existing_illness'],
            'illness_specify' => $validatedData['illness_specify'] ?? null,
            'with_disability' => $validatedData['with_disability'],
            'disability_specify' => $validatedData['disability_specify'] ?? null,
            'difficult_adl' => $validatedData['difficult_adl'],
            'dependent_iadl' => $validatedData['dependent_iadl'],
            'experience_loss' => $validatedData['experience_loss'],
        ]);

        Log::info('Health information created for beneficiary: ' . $beneficiary->id);


        //Eligibility and Remarks
        AssessmentRecommendation::create([
            'beneficiary_id' => $beneficiary->id,
            'remarks' => $validatedData['remarks'] ?? null,
            'eligibility' => $validatedData['eligibility'] ?? null,
        ]);
        Log::info('Assessment recommendation created for beneficiary: ' . $beneficiary->id);

        // Redirect or return response
        return redirect()->back()->with('success', 'Beneficiary added successfully!');
    }


    public function list()
    {
        $beneficiaries = Beneficiary::with([
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
            'spouse'
        ])->get();

        // Pass the beneficiaries to the view
        return view('layouts.file', compact('beneficiaries'));
    }

    public function updateStatus(Request $request, $id)
    {
        $beneficiary = Beneficiary::findOrFail($id);
        $beneficiary->status = $request->input('status');
        $beneficiary->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    //Display
    public function show($id)
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
            return response()->json(['error' => 'Beneficiary not found'], 404);
        }

        return view('layouts.show', compact('beneficiary'));
    }

    // Update Beneficiary
    public function edit($id)
    {
        $beneficiary = Beneficiary::find($id);

        return view('layouts.edit', compact('beneficiary'));
    }


    //Search in file
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Use whereHas to search within related BeneficiaryInfo model
        $beneficiaries = Beneficiary::whereHas('beneficiaryInfo', function ($q) use ($query) {
            $q->where('last_name', 'LIKE', "%{$query}%")
                ->orWhere('first_name', 'LIKE', "%{$query}%")
                ->orWhere('middle_name', 'LIKE', "%{$query}%");
        })->get();

        // If the request is AJAX, return a JSON response
        if ($request->ajax()) {
            $response = $beneficiaries->map(function ($beneficiary) {
                return [
                    'id' => $beneficiary->id,
                    'name' => "{$beneficiary->beneficiaryInfo->last_name}, {$beneficiary->beneficiaryInfo->first_name} {$beneficiary->beneficiaryInfo->middle_name}",
                    'status' => $beneficiary->status, // Include status in the response
                ];
            });

            return response()->json($response);
        }

        // If not an AJAX request, render the view
        return view('layouts.file', compact('beneficiaries'));
    }

    //Search in Staff Dashboard
    public function searchStaff(Request $request)
    {
        $query = $request->input('query');

        // Use whereHas to search within related BeneficiaryInfo model
        $beneficiaries = Beneficiary::whereHas('beneficiaryInfo', function ($q) use ($query) {
            $q->where('last_name', 'LIKE', "%{$query}%")
                ->orWhere('first_name', 'LIKE', "%{$query}%")
                ->orWhere('middle_name', 'LIKE', "%{$query}%");
        })->get();

        // If the request is AJAX, return a JSON response
        if ($request->ajax()) {
            $response = $beneficiaries->map(function ($beneficiary) {
                return [
                    'id' => $beneficiary->id,
                    'name' => "{$beneficiary->beneficiaryInfo->last_name}, {$beneficiary->beneficiaryInfo->first_name} {$beneficiary->beneficiaryInfo->middle_name}",
                    'status' => $beneficiary->status, // Include status in the response
                ];
            });

            return response()->json($response);
        }

        // If not an AJAX request, render the view
        return view('livewire.staff.dashboard', compact('beneficiaries'));
    }

    //Search in Super admin Dashboard
    public function searchSuper(Request $request)
    {
        $query = $request->input('query');

        // Use whereHas to search within related BeneficiaryInfo model
        $beneficiaries = Beneficiary::whereHas('beneficiaryInfo', function ($q) use ($query) {
            $q->where('last_name', 'LIKE', "%{$query}%")
                ->orWhere('first_name', 'LIKE', "%{$query}%")
                ->orWhere('middle_name', 'LIKE', "%{$query}%");
        })->get();

        // If the request is AJAX, return a JSON response
        if ($request->ajax()) {
            $response = $beneficiaries->map(function ($beneficiary) {
                return [
                    'id' => $beneficiary->id,
                    'name' => "{$beneficiary->beneficiaryInfo->last_name}, {$beneficiary->beneficiaryInfo->first_name} {$beneficiary->beneficiaryInfo->middle_name}",
                    'status' => $beneficiary->status, // Include status in the response
                ];
            });

            return response()->json($response);
        }

        // If not an AJAX request, render the view
        return view('livewire.superadmin.dashboard', compact('beneficiaries'));
    }
}
