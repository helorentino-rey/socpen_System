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
        $childrenNames = $beneficiary->child ? $beneficiary->child->pluck('children_name')->implode(',') : null;
        $childrenCivilStatus = $beneficiary->child ? $beneficiary->child->pluck('children_civil_status')->implode(',') : null;
        $childrenOccupation = $beneficiary->child ? $beneficiary->child->pluck('children_occupation')->implode(',') : null;
        $childrenIncome = $beneficiary->child ? $beneficiary->child->pluck('children_income')->implode(',') : null;
        $childrenContactNumber = $beneficiary->child ? $beneficiary->child->pluck('children_contact_number')->implode(',') : null;

        $representativeNames = $beneficiary->representative ? $beneficiary->representative->pluck('representative_name')->implode(',') : null;
        $representativeRelationship = $beneficiary->representative ? $beneficiary->representative->pluck('representative_relationship')->implode(',') : null;
        $representativeContactNumbers = $beneficiary->representative ? $beneficiary->representative->pluck('representative_contact_number')->implode(',') : null;

        return [
            'osca_id' => $beneficiary->osca_id ?? null,
            'ncsc_rrn' => $beneficiary->ncsc_rrn ?? null,
            'profile_upload' => $beneficiary->profile_upload ?? null,
            'status' => $beneficiary->status,

            'last_name' => $beneficiary->beneficiaryInfo->last_name ?? null,
            'first_name' => $beneficiary->beneficiaryInfo->first_name ?? null,
            'middle_name' => $beneficiary->beneficiaryInfo->middle_name ?? null,
            'name_extension' => $beneficiary->beneficiaryInfo->name_extension ?? null,

            'mother_last_name' => $beneficiary->mothersMaidenName->mother_last_name ?? null,
            'mother_first_name' => $beneficiary->mothersMaidenName->mother_first_name ?? null,
            'mother_middle_name' => $beneficiary->mothersMaidenName->mother_middle_name ?? null,

            'permanent_address_region' => $beneficiary->permanentAddress->region ?? null,
            'permanent_address_province' => $beneficiary->permanentAddress->province ?? null,
            'permanent_address_city' => $beneficiary->permanentAddress->city ?? null,
            'permanent_address_barangay' => $beneficiary->permanentAddress->barangay ?? null,
            'permanent_address_sitio' => $beneficiary->permanentAddress->sitio ?? null,

            'present_address_region' => $beneficiary->presentAddress->region ?? null,
            'present_address_province' => $beneficiary->presentAddress->province ?? null,
            'present_address_city' => $beneficiary->presentAddress->city ?? null,
            'present_address_barangay' => $beneficiary->presentAddress->barangay ?? null,
            'present_address_sitio' => $beneficiary->presentAddress->sitio ?? null,

            'date_of_birth' => $beneficiary->mothersMaidenName->date_of_birth ?? null,
            'place_of_birth_city' => $beneficiary->mothersMaidenName->place_of_birth_city ?? null,
            'place_of_birth_province' => $beneficiary->mothersMaidenName->place_of_birth_province ?? null,
            'age' => $beneficiary->mothersMaidenName->age ?? null,
            'sex' => $beneficiary->mothersMaidenName->sex ?? null,
            'civil_status' => $beneficiary->mothersMaidenName->civil_status ?? null,

            'affiliation_type' => $beneficiary->affiliation->affiliation_type ?? null,
            'hh_id' => $beneficiary->affiliation->hh_id ?? null,
            'indigenous_specify' => $beneficiary->affiliation->indigenous_specify ?? null,

            'spouse_last_name' => $beneficiary->spouse->spouse_last_name ?? null,
            'spouse_first_name' => $beneficiary->spouse->spouse_first_name ?? null,
            'spouse_middle_name' => $beneficiary->spouse->spouse_middle_name ?? null,
            'spouse_name_extension' => $beneficiary->spouse->spouse_name_extension ?? null,
            'spouse_contact' => $beneficiary->spouse->spouse_contact ?? null,

            'spouse_address_region' => $beneficiary->spouseAddress->region ?? null,
            'spouse_address_province' => $beneficiary->spouseAddress->province ?? null,
            'spouse_address_city' => $beneficiary->spouseAddress->city ?? null,
            'spouse_address_barangay' => $beneficiary->spouseAddress->barangay ?? null,
            'spouse_address_sitio' => $beneficiary->spouseAddress->sitio ?? null,

            'children_name' => $childrenNames,
            'children_civil_status' => $childrenCivilStatus,
            'children_occupation' => $childrenOccupation,
            'children_income' => $childrenIncome,
            'children_contact_number' => $childrenContactNumber,

            'representative_name' => $representativeNames,
            'representative_relationship' => $representativeRelationship,
            'representative_contact_number' => $representativeContactNumbers,

            'house_status' => $beneficiary->housingLivingStatus->house_status ?? null,
            'house_status_others_input' => $beneficiary->housingLivingStatus->house_status_others_input ?? null,
            'living_status' => $beneficiary->housingLivingStatus->living_status ?? null,
            'living_status_others_input' => $beneficiary->housingLivingStatus->living_status_others_input ?? null,

            'receiving_pension' => $beneficiary->economicInformation->receiving_pension ?? null,
            'pension_amount' => $beneficiary->economicInformation->pension_amount ?? null,
            'pension_source' => $beneficiary->economicInformation->pension_source ?? null,
            'permanent_income' => $beneficiary->economicInformation->permanent_income ?? null,
            'income_amount' => $beneficiary->economicInformation->income_amount ?? null,
            'income_source' => $beneficiary->economicInformation->income_source ?? null,
            'regular_support' => $beneficiary->economicInformation->regular_support ?? null,
            'support_amount' => $beneficiary->economicInformation->support_amount ?? null,
            'support_source' => $beneficiary->economicInformation->support_source ?? null,

            'existing_illness' => $beneficiary->healthInformation->existing_illness ?? null,
            'illness_specify' => $beneficiary->healthInformation->illness_specify ?? null,
            'with_disability' => $beneficiary->healthInformation->with_disability ?? null,
            'disability_specify' => $beneficiary->healthInformation->disability_specify ?? null,
            'difficult_adl' => $beneficiary->healthInformation->difficult_adl ?? null,
            'dependent_iadl' => $beneficiary->healthInformation->dependent_iadl ?? null,
            'experience_loss' => $beneficiary->healthInformation->experience_loss ?? null,

            'remarks' => $beneficiary->assessmentRecommendation->remarks ?? null,
            'eligibility' => $beneficiary->assessmentRecommendation->eligibility ?? null,
        ];
    }
}
