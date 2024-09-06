<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class CsvController extends Controller
{
    public function import(Request $request)
    {
        // Handle import logic here
    }

    public function export(Request $request)
    {
        $query = Beneficiary::query();

        if ($request->filled('province')) {
            $query->whereHas('presentAddress', function ($q) use ($request) {
                $q->where('province', $request->province);
            });
        }

        if ($request->filled('min_age') || $request->filled('max_age')) {
            $query->whereHas('mothersMaidenName', function ($q) use ($request) {
                if ($request->filled('min_age')) {
                    $q->where('age', '>=', $request->min_age);
                }
                if ($request->filled('max_age')) {
                    $q->where('age', '<=', $request->max_age);
                }
            });
        }        

        $beneficiaries = Beneficiary::with([
            'addresses',
            'presentAddress',
            'permanentAddress',
            'spouseAddress',
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
            'spouse'
        ])->get();

        if ($beneficiaries->isEmpty()) {
            return redirect()->back()->with('error', 'No beneficiaries matched the provided criteria.');
        }       

        $csvData = [];
        foreach ($beneficiaries as $beneficiary) {
            $csvData[] = [
                'osca_id' => $beneficiary->osca_id ?? 'N/A',
                'ncsc_rrn' => $beneficiary->ncsc_rrn ?? 'N/A',
                'profile_upload' => $beneficiary->profile_upload ?? 'N/A',
                'status' => $beneficiary->status,

                'last_name' => $beneficiary->beneficiaryInfo->last_name ?? 'N/A',
                'first_name' => $beneficiary->beneficiaryInfo->first_name ?? 'N/A',
                'middle_name' => $beneficiary->beneficiaryInfo->middle_name ?? 'N/A',
                'name_extension' => $beneficiary->beneficiaryInfo->name_extension ?? 'N/A',

                'mother_last_name' => $beneficiary->mothersMaidenName->mother_last_name ?? 'N/A',
                'mother_first_name' => $beneficiary->mothersMaidenName->mother_first_name ?? 'N/A',
                'mother_middle_name' => $beneficiary->mothersMaidenName->mother_middle_name ?? 'N/A',

                'region' => $beneficiary->permanentAddress->region ?? 'N/A',
                'province' => $beneficiary->permanentAddress->province ?? 'N/A',
                'city' => $beneficiary->permanentAddress->city ?? 'N/A',
                'barangay' => $beneficiary->permanentAddress->barangay ?? 'N/A',
                'sitio' => $beneficiary->permanentAddress->sitio ?? 'N/A',

                'region' => $beneficiary->presentAddress->region ?? 'N/A',
                'province' => $beneficiary->presentAddress->province ?? 'N/A',
                'city' => $beneficiary->presentAddress->city ?? 'N/A',
                'barangay' => $beneficiary->presentAddress->barangay ?? 'N/A',
                'sitio' => $beneficiary->presentAddress->sitio ?? 'N/A',

                'date_of_birth' => $beneficiary->mothersMaidenName->date_of_birth ?? 'N/A',
                'place_of_birth_city' => $beneficiary->mothersMaidenName->place_of_birth_city ?? 'N/A',
                'place_of_birth_province' => $beneficiary->mothersMaidenName->place_of_birth_province ?? 'N/A',
                'age' => $beneficiary->mothersMaidenName->age ?? 'N/A',
                'sex' => $beneficiary->mothersMaidenName->sex ?? 'N/A',
                'civil_status' => $beneficiary->mothersMaidenName->civil_status ?? 'N/A',

                'affiliation_type' => $beneficiary->affiliation->affiliation_type ?? 'N/A',
                'hh_id' => $beneficiary->affiliation->hh_id ?? 'N/A',
                'indigenous_specify' => $beneficiary->affiliation->indigenous_specify ?? 'N/A',

                'spouse_last_name' => $beneficiary->spouse->spouse_last_name ?? 'N/A',
                'spouse_first_name' => $beneficiary->spouse->spouse_first_name ?? 'N/A',
                'spouse_middle_name' => $beneficiary->spouse->spouse_middle_name ?? 'N/A',
                'spouse_name_extension' => $beneficiary->spouse->spouse_name_extension ?? 'N/A',

                'region' => $beneficiary->spouseAddress->region ?? 'N/A',
                'province' => $beneficiary->spouseAddress->province ?? 'N/A',
                'city' => $beneficiary->spouseAddress->city ?? 'N/A',
                'barangay' => $beneficiary->spouseAddress->barangay ?? 'N/A',
                'sitio' => $beneficiary->spouseAddress->sitio ?? 'N/A',

                'children_name' => $beneficiary->child->children_name ?? 'N/A',
                'children_civil_status' => $beneficiary->child->children_civil_status ?? 'N/A',
                'children_occupation' => $beneficiary->child->children_occupation ?? 'N/A',
                'children_income' => $beneficiary->child->children_income ?? 'N/A',
                'children_contact_number' => $beneficiary->child->children_contact_number ?? 'N/A',

                'representative_name' => $beneficiary->representative->representative_name ?? 'N/A',
                'representative_civil_status' => $beneficiary->representative->representative_civil_status ?? 'N/A',
                'representative_contact_number' => $beneficiary->representative->representative_contact_number ?? 'N/A',

                'caregiver_last_name' => $beneficiary->caregiver->caregiver_last_name ?? 'N/A',
                'caregiver_first_name' => $beneficiary->caregiver->caregiver_first_name ?? 'N/A',
                'caregiver_middle_name' => $beneficiary->caregiver->caregiver_middle_name ?? 'N/A',
                'caregiver_name_extension' => $beneficiary->caregiver->caregiver_name_extension ?? 'N/A',
                'caregiver_relationship' => $beneficiary->caregiver->caregiver_relationship ?? 'N/A',
                'caregiver_contact' => $beneficiary->caregiver->caregiver_contact ?? 'N/A',

                'house_status' => $beneficiary->housingLivingStatus->house_status ?? 'N/A',
                'house_status_others_input' => $beneficiary->housingLivingStatus->house_status_others_input ?? 'N/A',
                'living_status' => $beneficiary->housingLivingStatus->living_status ?? 'N/A',
                'living_status_others_input' => $beneficiary->housingLivingStatus->living_status_others_input ?? 'N/A',

                'receiving_pension' => $beneficiary->economicInformation->receiving_pension ?? 'N/A',
                'pension_amount' => $beneficiary->economicInformation->pension_amount ?? 'N/A',
                'pension_source' => $beneficiary->economicInformation->pension_source ?? 'N/A',
                'permanent_income' => $beneficiary->economicInformation->permanent_income ?? 'N/A',
                'income_amount' => $beneficiary->economicInformation->income_amount ?? 'N/A',
                'income_source' => $beneficiary->economicInformation->income_source ?? 'N/A',
                'regular_support' => $beneficiary->economicInformation->regular_support ?? 'N/A',
                'support_amount' => $beneficiary->economicInformation->support_amount ?? 'N/A',
                'support_source' => $beneficiary->economicInformation->support_source ?? 'N/A',

                'existing_illness' => $beneficiary->healthInformation->existing_illness ?? 'N/A',
                'illness_specify' => $beneficiary->healthInformation->illness_specify ?? 'N/A',
                'with_disability' => $beneficiary->healthInformation->with_disability ?? 'N/A',
                'disability_specify' => $beneficiary->healthInformation->disability_specify ?? 'N/A',
                'difficult_adl' => $beneficiary->healthInformation->difficult_adl ?? 'N/A',
                'dependent_iadl' => $beneficiary->healthInformation->dependent_iadl ?? 'N/A',
                'experience_loss' => $beneficiary->healthInformation->experience_loss ?? 'N/A',

                'remarks' => $beneficiary->assessmentRecommendation->remarks ?? 'N/A',
                'eligibility' => $beneficiary->assessmentRecommendation->eligibility ?? 'N/A',
                // Add other fields as needed
            ];
        }

        $filename = $request->input('filename', 'beneficiaries') . '.csv';
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array_keys($csvData[0]));

        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }

        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return Response::download($filename, $filename, $headers)->deleteFileAfterSend(true);
    }
}
