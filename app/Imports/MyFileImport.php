<?php

namespace App\Imports;

use App\Models\Beneficiary;
use App\Models\BeneficiaryInfo;
use App\Models\Address;
use App\Models\Affiliation;
use App\Models\Spouse;
use App\Models\Child;
use App\Models\Representative;
use App\Models\HousingLivingStatus;
use App\Models\EconomicInformation;
use App\Models\HealthInformation;
use App\Models\AssessmentRecommendation;
use App\Models\MothersMaidenName;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MyFileImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        function formatContactNumber($contact)
        {
            if (strpos($contact, '+63') === 0) {
                return $contact;
            } elseif (strpos($contact, '63') === 0) {
                return '+' . $contact;
            }
            return $contact;
        }

        $beneficiary = Beneficiary::create([
            'osca_id' => $row['osca_id'] ?? null,
            'ncsc_rrn' => $row['ncsc_rrn'] ?? null,
            'profile_upload' => $row['profile_upload'] ?? null,
            'status' => $row['status'] ?? null,
        ]);

        $beneficiaryInfo = new BeneficiaryInfo([
            'last_name' => $row['last_name'] ?? null,
            'first_name' => $row['first_name'] ?? null,
            'middle_name' => $row['middle_name'] ?? null,
            'name_extension' => $row['name_extension'] ?? null,
        ]);
        $beneficiary->beneficiaryInfo()->save($beneficiaryInfo);

        if (isset($row['mother_last_name']) || isset($row['mother_first_name']) || isset($row['mother_middle_name']) || isset($row['date_of_birth']) || isset($row['place_of_birth_city']) || isset($row['place_of_birth_province']) || isset($row['age']) || isset($row['sex']) || isset($row['civil_status'])) {
            $dateOfBirth = isset($row['date_of_birth']) ? Carbon::createFromFormat('d/m/Y', $row['date_of_birth'])->format('Y-m-d') : null;
            $motherMaidenName = new MothersMaidenName([
                'mother_last_name' => $row['mother_last_name'] ?? null,
                'mother_first_name' => $row['mother_first_name'] ?? null,
                'mother_middle_name' => $row['mother_middle_name'] ?? null,
                'date_of_birth' => $dateOfBirth,
                'place_of_birth_city' => $row['place_of_birth_city'] ?? null,
                'place_of_birth_province' => $row['place_of_birth_province'] ?? null,
                'age' => $row['age'] ?? null,
                'sex' => $row['sex'] ?? null,
                'civil_status' => $row['civil_status'] ?? null,
            ]);
            $beneficiary->mothersMaidenName()->save($motherMaidenName);
        }

        if (isset($row['permanent_address_region'])) {
            $permanentAddress = new Address([
                'region' => $row['permanent_address_region'] ?? null,
                'province' => $row['permanent_address_province'] ?? null,
                'city' => $row['permanent_address_city'] ?? null,
                'barangay' => $row['permanent_address_barangay'] ?? null,
                'sitio' => $row['permanent_address_sitio'] ?? null,
                'type' => 'permanent',
            ]);
            $beneficiary->permanentAddress()->save($permanentAddress);
        }

        if (isset($row['present_address_region'])) {
            $presentAddress = new Address([
                'region' => $row['present_address_region'] ?? null,
                'province' => $row['present_address_province'] ?? null,
                'city' => $row['present_address_city'] ?? null,
                'barangay' => $row['present_address_barangay'] ?? null,
                'sitio' => $row['present_address_sitio'] ?? null,
                'type' => 'present',
            ]);
            $beneficiary->presentAddress()->save($presentAddress);
        }

        if (isset($row['spouse_address_region'])) {
            $spouseAddress = new Address([
                'region' => $row['spouse_address_region'] ?? null,
                'province' => $row['spouse_address_province'] ?? null,
                'city' => $row['spouse_address_city'] ?? null,
                'barangay' => $row['spouse_address_barangay'] ?? null,
                'sitio' => $row['spouse_address_sitio'] ?? null,
                'type' => 'spouse_address',
            ]);
            $beneficiary->spouseAddress()->save($spouseAddress);
        }


        if (isset($row['affiliation_type'])) {
            $affiliation = new Affiliation([
                'affiliation_type' => $row['affiliation_type'] ?? null,
                'hh_id' => $row['hh_id'] ?? null,
                'indigenous_specify' => $row['indigenous_specify'] ?? null,
            ]);

            $beneficiary->affiliation()->save($affiliation);
        }

        if (isset($row['spouse_last_name']) || isset($row['spouse_first_name']) || isset($row['spouse_middle_name']) || isset($row['spouse_name_extension']) || isset($row['spouse_contact'])) {
            $spouse = new Spouse([
                'spouse_last_name' => $row['spouse_last_name'] ?? null,
                'spouse_first_name' => $row['spouse_first_name'] ?? null,
                'spouse_middle_name' => $row['spouse_middle_name'] ?? null,
                'spouse_name_extension' => $row['spouse_name_extension'] ?? null,
                'spouse_contact' => isset($row['spouse_contact']) ? formatContactNumber($row['spouse_contact']) : null,
            ]);
            $beneficiary->spouse()->save($spouse);
        }

        if (isset($row['children_name'])) {
            $childrenNames = array_map('trim', str_getcsv($row['children_name']));
            $childrenCivilStatus = array_map('trim', str_getcsv($row['children_civil_status'] ?? ''));
            $childrenOccupation = array_map('trim', str_getcsv($row['children_occupation'] ?? ''));
            $childrenIncome = array_map('trim', str_getcsv($row['children_income'] ?? ''));
            $childrenContactNumber = array_map('trim', str_getcsv($row['children_contact_number'] ?? ''));

            foreach ($childrenNames as $index => $childrenName) {
                $child = new Child([
                    'children_name' => $childrenName,
                    'children_civil_status' => $childrenCivilStatus[$index] ?? null,
                    'children_occupation' => $childrenOccupation[$index] ?? null,
                    'children_income' => $childrenIncome[$index] ?? null,
                    'children_contact_number' => isset($childrenContactNumber[$index]) ? formatContactNumber($childrenContactNumber[$index]) : null,
                ]);

                $beneficiary->child()->save($child);
            }
        }

        if (isset($row['representative_name'])) {
            $representativeNames = array_map('trim', str_getcsv($row['representative_name']));
            $representativeRelationships = array_map('trim', str_getcsv($row['representative_relationship'] ?? ''));
            $representativeContactNumbers = array_map('trim', str_getcsv($row['representative_contact_number'] ?? ''));

            foreach ($representativeNames as $index => $representativeName) {
                $representative = new Representative([
                    'representative_name' => $representativeName,
                    'representative_relationship' => $representativeRelationships[$index] ?? null,
                    'representative_contact_number' => isset($representativeContactNumbers[$index]) ? formatContactNumber($representativeContactNumbers[$index]) : null,
                ]);

                $beneficiary->representative()->save($representative);
            }
        }

        if (isset($row['house_status'])) {
            $housingLivingStatus = new HousingLivingStatus([
                'house_status' => $row['house_status'] ?? null,
                'house_status_others_input' => $row['house_status_others_input'] ?? null,
                'living_status' => $row['living_status'] ?? null,
                'living_status_others_input' => $row['living_status_others_input'] ?? null,
            ]);

            $beneficiary->housingLivingStatus()->save($housingLivingStatus);
        }

        if (isset($row['receiving_pension'])) {
            $economicInformation = new EconomicInformation([
                'receiving_pension' => $row['receiving_pension'] ?? null,
                'pension_amount' => $row['pension_amount'] ?? null,
                'pension_source' => $row['pension_source'] ?? null,
                'permanent_income' => $row['permanent_income'] ?? null,
                'income_amount' => $row['income_amount'] ?? null,
                'income_source' => $row['income_source'] ?? null,
                'regular_support' => $row['regular_support'] ?? null,
                'support_amount' => $row['support_amount'] ?? null,
                'support_source' => $row['support_source'] ?? null,
            ]);

            $beneficiary->economicInformation()->save($economicInformation);
        }

        if (isset($row['existing_illness'])) {
            $healthInformation = new HealthInformation([
                'existing_illness' => $row['existing_illness'] ?? null,
                'illness_specify' => $row['illness_specify'] ?? null,
                'with_disability' => $row['with_disability'] ?? null,
                'disability_specify' => $row['disability_specify'] ?? null,
                'difficult_adl' => $row['difficult_adl'] ?? null,
                'dependent_iadl' => $row['dependent_iadl'] ?? null,
                'experience_loss' => $row['experience_loss'] ?? null,
            ]);

            $beneficiary->healthInformation()->save($healthInformation);
        }

        if (isset($row['remarks']) || isset($row['eligibility'])) {
            $eligibility = in_array($row['eligibility'], ['Eligible', 'Not Eligible']) ? $row['eligibility'] : null;

            $assessmentRecommendation = new AssessmentRecommendation([
                'remarks' => $row['remarks'] ?? null,
                'eligibility' => $eligibility,
            ]);
            $beneficiary->assessmentRecommendation()->save($assessmentRecommendation);
        }


        return $beneficiary;
    }
}
