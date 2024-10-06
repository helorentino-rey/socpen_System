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
use Illuminate\Support\Facades\Auth;

class EditBeneficiaryController extends Controller
{
    public function edit(Request $request, $id)
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
        $validatedData = $request->validate([
            'osca_id' => 'required|string|unique:beneficiary,osca_id,' . $id,
            'ncsc_rrn' => 'nullable|integer',
            'profile_upload' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',

            'last_name' => 'required|string|max:20',
            'first_name' => 'required|string|max:25',
            'middle_name' => 'nullable|string|max:20',
            'name_extension' => 'required|string|max:4',

            'mother_last_name' => 'required|string|max:20',
            'mother_first_name' => 'required|string|max:25',
            'mother_middle_name' => 'nullable|string|max:20',
            'date_of_birth' => 'required|date',
            'place_of_birth_city' => 'required|string|max:30',
            'place_of_birth_province' => 'required|string|max:30',
            'age' => 'required|integer|min:0',
            'sex' => 'required|in:Male,Female,Prefer Not to Say',
            'civil_status' => 'required|in:Single,Married,Widowed,Separated',

            'permanent_address_region' => 'required|string|max:25',
            'permanent_address_province' => 'required|string|max:20',
            'permanent_address_city' => 'required|string|max:30',
            'permanent_address_barangay' => 'required|string|max:30',
            'permanent_address_sitio' => 'required|string|max:30',

            'present_address_region' => 'required|string|max:25',
            'present_address_province' => 'required|string|max:20',
            'present_address_city' => 'required|string|max:30',
            'present_address_barangay' => 'required|string|max:30',
            'present_address_sitio' => 'required|string|max:30',

            'affiliation' => 'nullable|array',
            'affiliation.*' => 'in:Listahanan,Pantawid Beneficiary,Indigenous People',
            'hh_id' => 'nullable|string|max:25',
            'indigenous_specify' => 'nullable|string|max:25',

            'spouse_last_name' => 'required|string|max:20',
            'spouse_first_name' => 'required|string|max:25',
            'spouse_middle_name' => 'nullable|string|max:20',
            'spouse_name_extension' => 'required|string|max:4',
            'spouse_contact' => 'nullable|string|max:13',

            'spouse_address_region' => 'required|string|max:25',
            'spouse_address_province' => 'required|string|max:20',
            'spouse_address_city' => 'required|string|max:30',
            'spouse_address_barangay' => 'required|string|max:30',
            'spouse_address_sitio' => 'required|string|max:30',


            'children' => 'present|array',
            'children.*.name' => 'nullable|string|max:50',
            'children.*.civil_status' => 'nullable|in:Single,Married,Widowed,Separated',
            'children.*.occupation' => 'nullable|string|max:50',
            'children.*.income' => 'nullable|string|max:10',
            'children.*.contact_number' => 'nullable|string|max:13',

            'representatives' => 'present|array',
            'representatives.*.name' => 'nullable|string|max:50',
            'representatives.*.relationship' => 'nullable|string|max:20',
            'representatives.*.contact_number' => 'nullable|string|max:13',

            'house_status' => 'required|array',
            'house_status.*' => 'required|string|in:Owned,Rent,Others',
            'house_status_others_input' => 'nullable|string|max:25',
            'living_status' => 'required|array',
            'living_status.*' => 'required|string|in:Living Alone,Living with spouse,Living with children,Others',
            'living_status_others_input' => 'nullable|string|max:25',

            'receiving_pension' => 'required|in:Yes,No',
            'pension_amount' => 'nullable|string|max:10',
            'pension_source' => 'nullable|string|max:25',
            'permanent_income' => 'required|in:Yes,No',
            'income_amount' => 'nullable|string|max:10',
            'income_source' => 'nullable|string|max:25',
            'regular_support' => 'required|in:Yes,No',
            'support_amount' => 'nullable|string|max:10',
            'support_source' => 'nullable|string|max:25',

            'existing_illness' => 'required|in:Yes,None',
            'illness_specify' => 'nullable|string|max:45',
            'with_disability' => 'required|in:Yes,None',
            'disability_specify' => 'nullable|string|max:45',
            'difficult_adl' => 'required|in:Yes,No',
            'dependent_iadl' => 'required|in:Yes,No',
            'experience_loss' => 'required|in:Yes,No',

            'remarks' => 'nullable|string|max:100',
            'eligibility' => 'nullable|in:Eligible,Not Eligible',
        ]);

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

        // Update beneficiary information
        $originalBeneficiaryData = $beneficiary->toArray();
        $beneficiaryData = [
            'osca_id' => $validatedData['osca_id'],
            'ncsc_rrn' => $validatedData['ncsc_rrn'],
        ];

        if (isset($validatedData['profile_upload'])) {
            $beneficiaryData['profile_upload'] = $validatedData['profile_upload'];
        }
        $beneficiary->update($beneficiaryData);
        $updatedBeneficiaryData = $beneficiary->toArray();

        $originalBeneficiaryInfo = BeneficiaryInfo::where('beneficiary_id', $beneficiary->id)->first()->toArray();
        $updatedBeneficiaryInfo = BeneficiaryInfo::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'last_name' => $validatedData['last_name'],
                'first_name' => $validatedData['first_name'],
                'middle_name' => $validatedData['middle_name'] ?? null,
                'name_extension' => $validatedData['name_extension'],
            ]
        )->toArray();

        // Update or create permanent address with names
        $originalPermanentAddress = Address::where('beneficiary_id', $beneficiary->id)
            ->where('type', 'permanent')
            ->first()
            ->toArray();
        $updatedPermanentAddress = Address::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id, 'type' => 'permanent'],
            [
                'region' => $permanent_region_name,
                'province' => $permanent_province_name,
                'city' => $permanent_city_name,
                'barangay' => $permanent_barangay_name,
                'sitio' => $validatedData['permanent_address_sitio'],
            ]
        )->toArray();

        // Update or create present address with names
        $originalPresentAddress = Address::where('beneficiary_id', $beneficiary->id)
            ->where('type', 'present')
            ->first()
            ->toArray();
        $updatedPresentAddress = Address::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id, 'type' => 'present'],
            [
                'region' => $present_region_name,
                'province' => $present_province_name,
                'city' => $present_city_name,
                'barangay' => $present_barangay_name,
                'sitio' => $validatedData['present_address_sitio'],
            ]
        )->toArray();

        // Update or create spouse address with names
        $originalSpouseAddress = Address::where('beneficiary_id', $beneficiary->id)
            ->where('type', 'spouse_address')
            ->first()
            ->toArray();
        $updatedSpouseAddress = Address::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id, 'type' => 'spouse_address'],
            [
                'region' => $spouse_region_name,
                'province' => $spouse_province_name,
                'city' => $spouse_city_name,
                'barangay' => $spouse_barangay_name,
                'sitio' => $validatedData['spouse_address_sitio'],
            ]
        )->toArray();

        // Update or create mother's maiden name record
        $originalMothersMaidenName = MothersMaidenName::where('beneficiary_id', $beneficiary->id)->first()->toArray();
        $updatedMothersMaidenName = MothersMaidenName::updateOrCreate(
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
        )->toArray();
        
        // Update or create affiliation record
        $originalAffiliation = $beneficiary->affiliation()->where('beneficiary_id', $beneficiary->id)->first();
        $originalAffiliationArray = $originalAffiliation ? $originalAffiliation->toArray() : [];

        $updatedAffiliation = $beneficiary->affiliation()->updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'affiliation_type' => is_array($validatedData['affiliation'] ?? []) ? implode(', ', $validatedData['affiliation'] ?? []) : '',
                'hh_id' => $validatedData['hh_id'] ?? null,
                'indigenous_specify' => $validatedData['indigenous_specify'] ?? null,
            ]
        )->toArray();

        // Update or create spouse record
        $originalSpouse = $beneficiary->spouse()->where('beneficiary_id', $beneficiary->id)->first();
        $originalSpouseArray = $originalSpouse ? $originalSpouse->toArray() : [];
       
        $updatedSpouse = $beneficiary->spouse()->updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'spouse_last_name' => $validatedData['spouse_last_name'],
                'spouse_first_name' => $validatedData['spouse_first_name'],
                'spouse_middle_name' => $validatedData['spouse_middle_name'] ?? null,
                'spouse_name_extension' => $validatedData['spouse_name_extension'],
                'spouse_contact' => $validatedData['spouse_contact'] ?? null,
            ]
        )->toArray();

       // Insert the new or updated children
        $originalChildren = $beneficiary->child()->get()->toArray();
        $beneficiary->child()->delete();
        
        $updatedChildren = [];
        foreach ($validatedData['children'] as $childData) {
            $updatedChildren[] = $beneficiary->child()->create([
                'children_name' => $childData['name'] ?? null,
                'children_civil_status' => $childData['civil_status'] ?? null,
                'children_occupation' => $childData['occupation'] ?? null,
                'children_income' => $childData['income'] ?? null,
                'children_contact_number' => $childData['contact_number'] ?? null,
            ])->toArray();
        }

        // Insert the new or updated representatives
        $originalRepresentatives = $beneficiary->representative()->get()->toArray();
        $beneficiary->representative()->delete();

        $updatedRepresentatives = [];
        foreach ($validatedData['representatives'] as $representativeData) {
            $updatedRepresentatives[] = $beneficiary->representative()->create([
                'representative_name' => $representativeData['name'] ?? null,
                'representative_relationship' => $representativeData['relationship'] ?? null,
                'representative_contact_number' => $representativeData['contact_number'] ?? null,
            ])->toArray();
        }

        // Handle "Others" fields for house and living status
        $houseStatusOthersInput = in_array('Others', $validatedData['house_status']) ? $validatedData['house_status_others_input'] : null;
        $livingStatusOthersInput = in_array('Others', $validatedData['living_status']) ? $validatedData['living_status_others_input'] : null;

        $originalHousingLivingStatus = $beneficiary->housingLivingStatus()->where('beneficiary_id', $beneficiary->id)->first();
        $originalHousingLivingStatusArray = $originalHousingLivingStatus ? $originalHousingLivingStatus->toArray() : [];

        // Update or create housing and living status
        $updatedHousingLivingStatus = $beneficiary->housingLivingStatus()->updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'house_status' => implode(',', $validatedData['house_status']),
                'house_status_others_input' => $houseStatusOthersInput,
                'living_status' => implode(',', $validatedData['living_status']),
                'living_status_others_input' => $livingStatusOthersInput,
            ]
        )->toArray();

        //Economic Information
        $originalEconomicInformation = $beneficiary->economicInformation->toArray();
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
        $updatedEconomicInformation = $beneficiary->economicInformation->toArray();

        // Update or create health information  
        $originalHealthInformation = $beneficiary->healthInformation->toArray();

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
        $updatedHealthInformation = $beneficiary->healthInformation->toArray();


        // Update or create assessment recommendation record
        $validatedData['eligibility'] = $validatedData['eligibility'] ?? null;

        $originalAssessmentRecommendation = AssessmentRecommendation::where('beneficiary_id', $beneficiary->id)->first();
        $originalAssessmentRecommendationArray = $originalAssessmentRecommendation ? $originalAssessmentRecommendation->toArray() : [];
        
        $updatedAssessmentRecommendation = AssessmentRecommendation::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'remarks' => $validatedData['remarks'],
                'eligibility' => $validatedData['eligibility'],
            ]
        )->toArray();
      
        // Log changes
        $changes = [];
        $humanReadableChanges = [];
        foreach ($updatedBeneficiaryData as $key => $value) {
            if ($key !== 'updated_at' && $key !== 'created_at' && $key !== 'id' && (!isset($originalBeneficiaryData[$key]) || $originalBeneficiaryData[$key] != $value)) {
                $originalValue = is_array($originalBeneficiaryData[$key] ?? null) ? json_encode($originalBeneficiaryData[$key]) : ($originalBeneficiaryData[$key] ?? 'N/A');
                $newValue = is_array($value) ? json_encode($value) : ($value ?: 'N/A');

                if ($originalValue != $newValue) {
                    $changes[$key] = ['old' => $originalValue, 'new' => $newValue];
                    $humanReadableChanges[] = '"' . $key . '" from ' . $originalValue . ' into ' . $newValue;
                }
            }
        }

        foreach ($updatedBeneficiaryInfo as $key => $value) {
            if ($key !== 'updated_at' && $originalBeneficiaryInfo[$key] != $value) {
                $changes[$key] = ['old' => $originalBeneficiaryInfo[$key], 'new' => $value];
                $humanReadableChanges[] = '"' . $key . '" from ' . $originalBeneficiaryInfo[$key] . ' into ' . $value;
            }
        }

        foreach ($updatedPermanentAddress as $key => $value) {
            if ($key !== 'updated_at' && $originalPermanentAddress[$key] != $value) {
                $changes[$key] = ['old' => $originalPermanentAddress[$key], 'new' => $value];
                $humanReadableChanges[] = '"' . $key . '" from ' .  $originalPermanentAddress[$key] . ' into ' . $value;
            }
        }

        foreach ($updatedPresentAddress as $key => $value) {
            if ($key !== 'updated_at' && $originalPresentAddress[$key] != $value) {
                $changes[$key] = ['old' => $originalPresentAddress[$key], 'new' => $value];
                $humanReadableChanges[] = '"' . $key . '" from ' . $originalPresentAddress[$key] . ' into ' . $value;
            }
        }

        foreach ($updatedSpouseAddress as $key => $value) {
            if ($key !== 'updated_at' &&  $originalSpouseAddress[$key] != $value) {
                $changes[$key] = ['old' =>  $originalSpouseAddress[$key], 'new' => $value];
                $humanReadableChanges[] = '"' . $key . '" from ' .  $originalSpouseAddress[$key] . ' into ' . $value;
            }
        }

        foreach ($updatedMothersMaidenName as $key => $value) {
            if ($key !== 'updated_at' &&  $originalMothersMaidenName[$key] != $value) {
                $changes[$key] = ['old' =>  $originalMothersMaidenName[$key], 'new' => $value];
                $humanReadableChanges[] = '"' . $key . '" from ' .  $originalMothersMaidenName[$key] . ' into ' . $value;
            }
        }

        foreach ($updatedAffiliation as $key => $value) {
            if ($key !== 'updated_at' && (!isset($originalAffiliationArray[$key]) || $originalAffiliationArray[$key] != $value)) {
                if (($originalAffiliationArray[$key] ?? 'N/A') != ($value ?: 'N/A')) {
                    $changes[$key] = [
                        'old' => $originalAffiliationArray[$key] ?? 'N/A',
                        'new' => $value ?: 'N/A' 
                    ];
                    $humanReadableChanges[] = '"' . $key . '" from ' . ($originalAffiliationArray[$key] ?? 'N/A') . ' into ' . ($value ?: 'N/A');
                }
            }
        }

        foreach ($updatedSpouse as $key => $value) {
            if ($key !== 'updated_at' && (!isset($originalSpouseArray[$key]) || $originalSpouseArray[$key] != $value)) {
                if (($originalSpouseArray[$key] ?? 'N/A') != ($value ?: 'N/A')) {
                    $changes[$key] = [
                        'old' => $originalSpouseArray[$key] ?? 'N/A',
                        'new' => $value ?: 'N/A' 
                    ];
                    $humanReadableChanges[] = '"' . $key . '" from ' . ($originalSpouseArray[$key] ?? 'N/A') . ' into ' . ($value ?: 'N/A');
                }
            }
        }

        //children records
        foreach ($originalChildren as $index => $originalChild) {
            $updatedChild = $updatedChildren[$index] ?? [];
            foreach ($originalChild as $key => $value) {
                if (!in_array($key, ['updated_at', 'created_at', 'id']) && (!isset($updatedChild[$key]) || $updatedChild[$key] != $value)) {
                    if (($value ?? 'N/A') != ($updatedChild[$key] ?? 'N/A')) {
                        $changes['children'][$index][$key] = [
                            'old' => $value ?? 'N/A',
                            'new' => $updatedChild[$key] ?? 'N/A' 
                        ];
                        $humanReadableChanges[] = ' "' . $key . '" from ' . ($value ?? 'N/A') . ' into ' . ($updatedChild[$key] ?? 'N/A');
                    }
                }
            }
        }

        //representatives records
        foreach ($originalRepresentatives as $index => $originalRepresentative) {
            $updatedRepresentative = $updatedRepresentatives[$index] ?? [];
            foreach ($originalRepresentative as $key => $value) {
                if (!in_array($key, ['updated_at', 'created_at', 'id']) && (!isset($updatedRepresentative[$key]) || $updatedRepresentative[$key] != $value)) {
                    if (($value ?? 'N/A') != ($updatedRepresentative[$key] ?? 'N/A')) {
                        $changes['representatives'][$index][$key] = [
                            'old' => $value ?? 'N/A',
                            'new' => $updatedRepresentative[$key] ?? 'N/A' 
                        ];
                        $humanReadableChanges[] = ' "' . $key . '" from ' . ($value ?? 'N/A') . ' into ' . ($updatedRepresentative[$key] ?? 'N/A');
                    }
                }
            }
        }

        //housing and living status records
        foreach ($updatedHousingLivingStatus as $key => $value) {
            if (!in_array($key, ['updated_at', 'created_at', 'id']) && (!isset($originalHousingLivingStatusArray[$key]) || $originalHousingLivingStatusArray[$key] != $value)) {
                if (($originalHousingLivingStatusArray[$key] ?? 'N/A') != ($value ?: 'N/A')) {
                    $changes['housing_living_status'][$key] = [
                        'old' => $originalHousingLivingStatusArray[$key] ?? 'N/A',
                        'new' => $value ?: 'N/A' 
                    ];
                    $humanReadableChanges[] = '"' . $key . '" from ' . ($originalHousingLivingStatusArray[$key] ?? 'N/A') . ' into ' . ($value ?: 'N/A');
                }
            }
        }

        //economic information records
        foreach ($updatedEconomicInformation as $key => $value) {
            if (!in_array($key, ['updated_at', 'created_at', 'id']) && (!isset($originalEconomicInformation[$key]) || $originalEconomicInformation[$key] != $value)) {
                $originalValue = is_array($originalEconomicInformation[$key] ?? null) ? json_encode($originalEconomicInformation[$key]) : ($originalEconomicInformation[$key] ?? 'N/A');
                $newValue = is_array($value) ? json_encode($value) : ($value ?: 'N/A');

                if ($originalValue != $newValue) {
                    $changes['economic_information'][$key] = [
                        'old' => $originalValue,
                        'new' => $newValue
                    ];
                    $humanReadableChanges[] = '"' . $key . '" from ' . $originalValue . ' into ' . $newValue;
                }
            }
        }

        $filteredHumanReadableChanges = array_filter($humanReadableChanges, function ($change) {
            return !str_contains($change, 'economic_information');
        });
        $humanReadableChanges = $filteredHumanReadableChanges;

        //health information records
        foreach ($updatedHealthInformation as $key => $value) {
            if (!in_array($key, ['updated_at', 'created_at', 'id']) && (!isset($originalHealthInformation[$key]) || $originalHealthInformation[$key] != $value)) {
                $originalValue = is_array($originalHealthInformation[$key] ?? null) ? json_encode($originalHealthInformation[$key]) : ($originalHealthInformation[$key] ?? 'N/A');
                $newValue = is_array($value) ? json_encode($value) : ($value ?: 'N/A');

                if ($originalValue != $newValue) {
                    $changes['health_information'][$key] = [
                        'old' => $originalValue,
                        'new' => $newValue
                    ];
                    $humanReadableChanges[] = '"' . $key . '" from ' . $originalValue . ' into ' . $newValue;
                }
            }
        }

        $filteredHumanReadableChanges = array_filter($humanReadableChanges, function ($change) {
            return !str_contains($change, 'health_information');
        });
        $humanReadableChanges = $filteredHumanReadableChanges;

        //assessment recommendation records
        foreach ($updatedAssessmentRecommendation as $key => $value) {
            if (!in_array($key, ['updated_at', 'created_at', 'id']) && (!isset($originalAssessmentRecommendationArray[$key]) || $originalAssessmentRecommendationArray[$key] != $value)) {
                $originalValue = is_array($originalAssessmentRecommendationArray[$key] ?? null) ? json_encode($originalAssessmentRecommendationArray[$key]) : ($originalAssessmentRecommendationArray[$key] ?? 'N/A');
                $newValue = is_array($value) ? json_encode($value) : ($value ?: 'N/A');

                if ($originalValue != $newValue) {
                    $changes['assessment_recommendation'][$key] = [
                        'old' => $originalValue,
                        'new' => $newValue
                    ];
                    $humanReadableChanges[] = '"' . $key . '" from ' . $originalValue . ' into ' . $newValue;
                }
            }
        }

        $filteredHumanReadableChanges = array_filter($humanReadableChanges, function ($change) {
            return !str_contains($change, 'assessment_recommendation');
        });
        $humanReadableChanges = $filteredHumanReadableChanges;

        // Get the authenticated user from different guards
        $superadmin = Auth::guard('superadmin')->user();
        $admin = Auth::guard('admin')->user();
        $staff = Auth::guard('staff')->user();

        if (!$superadmin && !$admin && !$staff) {
            dd('No authenticated user found in any guard');
        }

        $user = $superadmin ?? $admin ?? $staff;

        // Check if the user is authenticated
        if ($user) {
            // Log the action with human-readable changes only
            \App\Models\Log::create([
                'user' => $user->employee_id . ' [' . $user->usertype . ']',
                'action' => 'Edited beneficiary with OSCA ID ' . $beneficiary->osca_id . ': ' . implode(', ', $humanReadableChanges),
            ]);
        } else {
            // Handle the case where the user is not authenticated
            \App\Models\Log::create([
                'user' => 'Unknown User',
                'action' => 'Edited beneficiary with OSCA ID ' . $beneficiary->osca_id . ': ' . implode(', ', $humanReadableChanges),
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Beneficiary updated successfully!');
    }
}
