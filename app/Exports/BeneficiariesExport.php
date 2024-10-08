<?php

namespace App\Exports;

use App\Models\Beneficiary;
use Vitorccs\LaravelCsv\Concerns\Exportables\Exportable;
use Vitorccs\LaravelCsv\Concerns\Exportables\FromQuery;
use Vitorccs\LaravelCsv\Concerns\WithHeadings;
use Vitorccs\LaravelCsv\Concerns\WithMapping;

class BeneficiariesExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function query()
    {
        $query = Beneficiary::with(
            'child',
            'representative',
            'beneficiaryInfo',
            'mothersMaidenName',
            'permanentAddress',
            'presentAddress',
            'spouseAddress',
            'affiliation',
            'assessmentRecommendation',
            'economicInformation',
            'healthInformation',
            'housingLivingStatus',
            'spouse'
        );

        if ($this->request->has('province')) {
            if ($this->request->province) {
                $query->whereHas('presentAddress', function ($q) {
                    $q->where('province', $this->request->province);
                });
            }
        }
        return $query;
    }

    public function headings(): array
    {
        return [
            'OSCA ID',
            'NCSC RRN',
            'Profile Upload',
            'Status',

            'Last Name',
            'First Name',
            'Middle Name',
            'Name Extension',

            'Mother Last Name',
            'Mother First Name',
            'Mother Middle Name',

            'Permanent Address Region',
            'Permanent Address Province',
            'Permanent Address City',
            'Permanent Address Barangay',
            'Permanent Address Sitio',

            'Present Address Region',
            'Present Address Province',
            'Present Address City',
            'Present Address Barangay',
            'Present Address Sitio',

            'Date of Birth',
            'Place of Birth City',
            'Place of Birth Province',
            'Age',
            'Sex',
            'Civil Status',

            'Affiliation Type',
            'HH ID',
            'Indigenous Specify',

            'Spouse Last Name',
            'Spouse First Name',
            'Spouse Middle Name',
            'Spouse Name Extension',
            'Spouse Contact',

            'Spouse Address Region',
            'Spouse Address Province',
            'Spouse Address City',
            'Spouse Address Barangay',
            'Spouse Address Sitio',

            'Children Name',
            'Children Civil Status',
            'Children Occupation',
            'Children Income',
            'Children Contact Number',

            'Representative Name',
            'Representative Relationship',
            'Representative Contact Number',

            'House Status',
            'House Status Others Input',
            'Living Status',
            'Living Status Others Input',

            'Receiving Pension',
            'Pension Amount',
            'Pension Source',
            'Permanent Income',
            'Income Amount',
            'Income Source',
            'Regular Support',
            'Support Amount',
            'Support Source',

            'Existing Illness',
            'Illness Specify',
            'With Disability',
            'Disability Specify',
            'Difficult ADL',
            'Dependent IADL',
            'Experience Loss',

            'Remarks',
            'Eligibility'
        ];
    }

    public function map($beneficiary): array
    {
        $childrenNames = $beneficiary->child ? $beneficiary->child->pluck('children_name')->implode(',') : 'N/A';
        $childrenCivilStatus = $beneficiary->child ? $beneficiary->child->pluck('children_civil_status')->implode(',') : 'N/A';
        $childrenOccupation = $beneficiary->child ? $beneficiary->child->pluck('children_occupation')->implode(',') : 'N/A';
        $childrenIncome = $beneficiary->child ? $beneficiary->child->pluck('children_income')->implode(',') : 'N/A';
        $childrenContactNumber = $beneficiary->child ? $beneficiary->child->pluck('children_contact_number')->implode(',') : 'N/A';

        $representativeNames = $beneficiary->representative ? $beneficiary->representative->pluck('representative_name')->implode(',') : 'N/A';
        $representativeRelationship = $beneficiary->representative ? $beneficiary->representative->pluck('representative_relationship')->implode(',') : 'N/A';
        $representativeContactNumbers = $beneficiary->representative ? $beneficiary->representative->pluck('representative_contact_number')->implode(',') : 'N/A';
        
        return [
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

            'permanent_address_region' => $beneficiary->permanentAddress->region ?? 'N/A',
            'permanent_address_province' => $beneficiary->permanentAddress->province ?? 'N/A',
            'permanent_address_city' => $beneficiary->permanentAddress->city ?? 'N/A',
            'permanent_address_barangay' => $beneficiary->permanentAddress->barangay ?? 'N/A',
            'permanent_address_sitio' => $beneficiary->permanentAddress->sitio ?? 'N/A',

            'present_address_region' => $beneficiary->presentAddress->region ?? 'N/A',
            'present_address_province' => $beneficiary->presentAddress->province ?? 'N/A',
            'present_address_city' => $beneficiary->presentAddress->city ?? 'N/A',
            'present_address_barangay' => $beneficiary->presentAddress->barangay ?? 'N/A',
            'present_address_sitio' => $beneficiary->presentAddress->sitio ?? 'N/A',

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
            'spouse_contact' => $beneficiary->spouse->spouse_contact ?? 'N/A',

            'spouse_address_region' => $beneficiary->spouseAddress->region ?? 'N/A',
            'spouse_address_province' => $beneficiary->spouseAddress->province ?? 'N/A',
            'spouse_address_city' => $beneficiary->spouseAddress->city ?? 'N/A',
            'spouse_address_barangay' => $beneficiary->spouseAddress->barangay ?? 'N/A',
            'spouse_address_sitio' => $beneficiary->spouseAddress->sitio ?? 'N/A',
           
            'children_name' => $childrenNames,
            'children_civil_status' => $childrenCivilStatus,
            'children_occupation' => $childrenOccupation,
            'children_income' => $childrenIncome,
            'children_contact_number' => $childrenContactNumber,

            'representative_name' => $representativeNames,
            'representative_relationship' => $representativeRelationship,
            'representative_contact_number' => $representativeContactNumbers,

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
        ];
    }
}
