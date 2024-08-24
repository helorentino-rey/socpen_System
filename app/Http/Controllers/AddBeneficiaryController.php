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
            'osca_id' => 'required|integer|unique:beneficiary,osca_id',
            'ncsc_rrn' => 'nullable|integer',
            'profile_upload' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',

            'last_name' => 'required|string|max:20',
            'first_name' => 'required|string|max:20',
            'middle_name' => 'nullable|string|max:20',
            'name_extension' => 'nullable|string|max:4',

            'mother_last_name' => 'required|string|max:25',
            'mother_first_name' => 'required|string|max:25',
            'mother_middle_name' => 'nullable|string|max:25',
            'date_of_birth' => 'required|date',
            'place_of_birth_city' => 'required|string|max:25',
            'place_of_birth_province' => 'required|string|max:25',
            'age' => 'required|integer|min:0',
            'sex' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Widowed,Separated',

            // // Address validation
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

            'affiliation' => 'required|array',
            'affiliation.*' => 'in:Listahanan,Pantawid Beneficiary,Indigenous People',
            'hh_id' => 'nullable|string|max:25',
            'indigenous_specify' => 'nullable|string|max:30',

            'spouse_last_name' => 'required|string|max:20',
            'spouse_first_name' => 'required|string|max:20',
            'spouse_middle_name' => 'nullable|string|max:20',
            'spouse_name_extension' => 'nullable|string|max:4',
            // 'spouse_contact' => 'required|string|max:13',

            'spouse_address_region' => 'required|string|max:20',
            'spouse_address_province' => 'required|string|max:20',
            'spouse_address_city' => 'required|string|max:20',
            'spouse_address_barangay' => 'required|string|max:20',
            'spouse_address_sitio' => 'required|string|max:30',

            'children.*.name' => 'required|string|max:50',
            'children.*.civil_status' => 'required|in:Single,Married,Divorced,Widowed',
            'children.*.occupation' => 'required|string|max:50',
            'children.*.income' => 'required|string|max:10',
            'children.*.contact_number' => 'required|string|max:13',

            'representatives.*.name' => 'required|string|max:50',
            'representatives.*.civil_status' => 'required|in:Single,Married,Divorced,Widowed',
            'representatives.*.contact_number' => 'required|string|max:13',

            'caregiver_last_name' => 'required|string|max:25',
            'caregiver_first_name' => 'required|string|max:25',
            'caregiver_middle_name' => 'nullable|string|max:25',
            'caregiver_name_extension' => 'nullable|string|max:4',
            'caregiver_relationship' => 'nullable|string|max:25',
            'caregiver_contact' => 'nullable|string|max:13',

            'house_status' => 'required|in:Owned,Rent,Others',
            'house_status_others_input' => 'nullable|string',
            'living_status' => 'required|in:Living Alone,Living with spouse,Living with children,Others',
            'living_status_others_input' => 'nullable|string',

            'receiving_pension' => 'required|in:Yes,No',
            'pension_amount' => 'nullable|string|max:10',
            'pension_source' => 'nullable|string|max:30',
            'permanent_income' => 'required|in:Yes,None',
            'income_amount' => 'nullable|string|max:10',
            'income_source' => 'nullable|string|max:30',
            'regular_support' => 'required|in:Yes,None',
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
            'eligibility' => 'required|in:Eligible,Not Eligible',
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
            'profile_upload' => $filePath,
        ]);
        Log::info('Beneficiary created: ' . $beneficiary->id);

        // Create a new beneficiary info record
        BeneficiaryInfo::create([
            'beneficiary_id' => $beneficiary->id,
            'last_name' => $validatedData['last_name'],
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'],
            'name_extension' => $validatedData['name_extension'],
        ]);
        Log::info('Beneficiary info created for beneficiary: ' . $beneficiary->id);

        // // Save permanent address with names
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

        // // Save present address with names
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

        // // Create a new mother's maiden name record
        MothersMaidenName::create([
            'beneficiary_id' => $beneficiary->id,
            'mother_last_name' =>  $validatedData['mother_last_name'],
            'mother_first_name' =>  $validatedData['mother_first_name'],
            'mother_middle_name' =>  $validatedData['mother_middle_name'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'place_of_birth_city' => $validatedData['place_of_birth_city'],
            'place_of_birth_province' => $validatedData['place_of_birth_province'],
            'age' => $validatedData['age'],
            'sex' => $validatedData['sex'],
            'civil_status' => $validatedData['civil_status'],
        ]);
        Log::info('Mother\'s maiden name created for beneficiary: ' . $beneficiary->id);

        //Affiliation
        foreach ($request->input('affiliation') as $affiliation) {
            Affiliation::create([
                'beneficiary_id' => $beneficiary->id,
                'affiliation_type' => $affiliation,
                'hh_id' => $validatedData['hh_id'],
                'indigenous_specify' => $validatedData['indigenous_specify'],
            ]);
            Log::info('Affiliation created for beneficiary: ' . $beneficiary->id . ' with type: ' . $affiliation);
        }

        // Create a new spouse record
        Spouse::create([
            'beneficiary_id' => $beneficiary->id,
            'spouse_last_name' => $validatedData['spouse_last_name'],
            'spouse_first_name' => $validatedData['spouse_first_name'],
            'spouse_middle_name' => $validatedData['spouse_middle_name'],
            'spouse_name_extension' => $validatedData['spouse_name_extension'],
            // 'spouse_contact' => $validatedData['spouse_contact'],
        ]);
        Log::info('Spouse created for beneficiary: ' . $beneficiary->id);

        // Create a new child record
        foreach ($validatedData['children'] as $childData) {
            Child::create([
                'beneficiary_id' => $beneficiary->id,
                'children_name' => $childData['name'],
                'children_civil_status' => $childData['civil_status'],
                'children_occupation' => $childData['occupation'],
                'children_income' => $childData['income'],
                'children_contact_number' => $childData['contact_number'],
            ]);
            Log::info('Child created for beneficiary: ' . $beneficiary->id);
        }

        // Create a new representative record
        foreach ($validatedData['representatives'] as $representativeData) {
            Representative::create([
                'beneficiary_id' => $beneficiary->id,
                'representative_name' => $representativeData['name'],
                'representative_civil_status' => $representativeData['civil_status'],
                'representative_contact_number' => $representativeData['contact_number'],
            ]);
            Log::info('Representative created for beneficiary: ' . $beneficiary->id);
        }

        // Create a new caregiver record
        Caregiver::create([
            'beneficiary_id' => $beneficiary->id,
            'caregiver_last_name' => $validatedData['caregiver_last_name'],
            'caregiver_first_name' => $validatedData['caregiver_first_name'],
            'caregiver_middle_name' => $validatedData['caregiver_middle_name'],
            'caregiver_name_extension' => $validatedData['caregiver_name_extension'],
            'caregiver_relationship' => $validatedData['caregiver_relationship'],
            'caregiver_contact' => $validatedData['caregiver_contact'],
        ]);
        Log::info('Caregiver created for beneficiary: ' . $beneficiary->id);

        // Create a new housing living status record
        HousingLivingStatus::create([
            'beneficiary_id' => $beneficiary->id,
            'house_status' => $validatedData['house_status'],
            'house_status_others_input' => $validatedData['house_status_others_input'],
            'living_status' => $validatedData['living_status'],
            'living_status_others_input' => $validatedData['living_status_others_input'],
        ]);
        Log::info('Housing living status created for beneficiary: ' . $beneficiary->id);

        //Economic Information
        EconomicInformation::create([
            'beneficiary_id' => $beneficiary->id,
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
        Log::info('Economic information created for beneficiary: ' . $beneficiary->id);

        //Health Information
        HealthInformation::create([
            'beneficiary_id' => $beneficiary->id,
            'existing_illness' => $validatedData['existing_illness'],
            'illness_specify' => $validatedData['illness_specify'],
            'with_disability' => $validatedData['with_disability'],
            'disability_specify' => $validatedData['disability_specify'],
            'difficult_adl' => $validatedData['difficult_adl'],
            'dependent_iadl' => $validatedData['dependent_iadl'],
            'experience_loss' => $validatedData['experience_loss'],
        ]);
        Log::info('Health information created for beneficiary: ' . $beneficiary->id);

        //Eligibility and Remarks
        AssessmentRecommendation::create([
            'beneficiary_id' => $beneficiary->id,
            'remarks' => $validatedData['remarks'],
            'eligibility' => $validatedData['eligibility'],
        ]);
        Log::info('Assessment recommendation created for beneficiary: ' . $beneficiary->id);

        // Redirect or return response
        return redirect()->back()->with('success', 'Beneficiary added successfully!');
    }
}
