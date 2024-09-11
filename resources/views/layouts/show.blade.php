
<style>
    .modal-container {
     max-width: 800px;
     margin: 20px auto;
     background: #ffffff;
     border-radius: 8px;
     padding: 20px;
     box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
     font-family: 'Arial', sans-serif;
     color: #333;
 }
 
 .modal-header h4 {
     font-size: 24px;
     font-weight: bold;
     color: #1A1A1A;
     margin-bottom: 10px;
     border-bottom: 2px solid #dfe1e5;
     padding-bottom: 5px;
 }
 
 .profile-picture img {
     width: 150px;
     height: 150px;
     border-radius: 10px; /* Changed to make the image square */
     border: 3px solid #1a73e8;
     object-fit: cover;
     margin-bottom: 15px;
     box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
 }
 
 .modal-body {
     margin-top: 15px;
 }
 
 .info-section {
     margin-bottom: 20px;
     padding: 15px;
     border-radius: 5px;
     background-color: #f1f3f4;
     box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
 }
 
 .info-section h5 {
     font-size: 20px;
     color: #0041C4;
     margin-bottom: 10px;
 }
 
 .info-section p {
     margin: 5px 0;
 }
 
 .info-section p strong {
     color: #1a73e8;
     font-weight: bold;
 }
 
 .modal-footer {
     text-align: right;
 }
 
 .close-button {
     padding: 10px 20px;
     background: linear-gradient(90deg, #0066FF, #0041C4);
     color: #ffffff;
     border: none;
     border-radius: 5px;
     cursor: pointer;
     font-size: 16px;
 }
 
 .close-button:hover {
     background: linear-gradient(90deg, #0041C4, #002494);
 }
 
 /* Responsive Design */
 @media (max-width: 768px) {
     .modal-container {
         padding: 15px;
     }
 
     .profile-picture img {
         width: 120px;
         height: 120px;
     }
 } 
</style>
 
 <div class="modal-container">
     <div class="modal-header">
         <h4>Beneficiary Information</h4>
         @if ($beneficiary->profile_upload)
             <div class="profile-picture">
                 <img src="{{ asset('storage/' . $beneficiary->profile_upload) }}" alt="Profile Photo">
             </div>
         @endif
     </div>
 
     <div class="modal-body">
         <div class="info-section">
             <h5>General Information</h5>
             <p><strong>OSCA ID No:</strong> {{ $beneficiary->osca_id }}</p>
             <p><strong>NCSC RRN:</strong> {{ $beneficiary->ncsc_rrn }}</p>
             <p><strong>Status:</strong> {{ $beneficiary->status }}</p>
         </div>
 
         <div class="info-section">
             <h5>Personal Information</h5>
             <p><strong>Last Name:</strong> {{ $beneficiary->BeneficiaryInfo->last_name }}</p>
             <p><strong>First Name:</strong> {{ $beneficiary->BeneficiaryInfo->first_name }}</p>
             <p><strong>Middle Name:</strong> {{ $beneficiary->BeneficiaryInfo->middle_name }}</p>
             <p><strong>Name Extension:</strong> {{ $beneficiary->BeneficiaryInfo->name_extension }}</p>
             <p><strong>Date of Birth:</strong>
                 {{ \Carbon\Carbon::parse($beneficiary->MothersMaidenName->date_of_birth)->format('F j, Y') }}</p>
             <p><strong>Age:</strong> {{ $beneficiary->MothersMaidenName->age }}</p>
             <p><strong>Sex:</strong> {{ $beneficiary->MothersMaidenName->sex }}</p>
             <p><strong>Civil Status:</strong> {{ $beneficiary->MothersMaidenName->civil_status }}</p>
         </div>
 
         <div class="info-section">
             <h5>Mother's Maiden Name</h5>
             <p><strong>Last Name:</strong> {{ $beneficiary->MothersMaidenName->mother_last_name }}</p>
             <p><strong>First Name:</strong> {{ $beneficiary->MothersMaidenName->mother_first_name }}</p>
             <p><strong>Middle Name:</strong> {{ $beneficiary->MothersMaidenName->mother_middle_name }}</p>
         </div>
 
         <div class="info-section">
             <h5>Permanent Address</h5>
             <p><strong>Region:</strong>
                 {{ $beneficiary->addresses->where('type', 'permanent')->first()->region ?? 'N/A' }}</p>
             <p><strong>Province:</strong>
                 {{ $beneficiary->addresses->where('type', 'permanent')->first()->province ?? 'N/A' }}
             </p>
             <p><strong>City:</strong> {{ $beneficiary->addresses->where('type', 'permanent')->first()->city ?? 'N/A' }}
             </p>
             <p><strong>Barangay:</strong>
                 {{ $beneficiary->addresses->where('type', 'permanent')->first()->barangay ?? 'N/A' }}
             </p>
             <p><strong>Sitio:</strong>
                 {{ $beneficiary->addresses->where('type', 'permanent')->first()->sitio ?? 'N/A' }}</p>
         </div>
 
         <div class="info-section">
             <h5>Present Address</h5>
             <p><strong>Region:</strong>
                 {{ $beneficiary->addresses->where('type', 'present')->first()->region ?? 'N/A' }}</p>
             <p><strong>Province:</strong>
                 {{ $beneficiary->addresses->where('type', 'present')->first()->province ?? 'N/A' }}
             </p>
             <p><strong>City:</strong> {{ $beneficiary->addresses->where('type', 'present')->first()->city ?? 'N/A' }}
             </p>
             <p><strong>Barangay:</strong>
                 {{ $beneficiary->addresses->where('type', 'present')->first()->barangay ?? 'N/A' }}
             </p>
             <p><strong>Sitio:</strong> {{ $beneficiary->addresses->where('type', 'present')->first()->sitio ?? 'N/A' }}
             </p>
         </div>
         <div class="info-section">
             <h5>Affiliation</h5>
             <p><strong>Affiliation Type:</strong> {{ $beneficiary->affiliation->affiliation_type ?? 'N/A' }}</p>
             <p><strong>Household ID:</strong> {{ $beneficiary->affiliation->hh_id ?? 'N/A' }}</p>
             <p><strong>Indigenous Specify:</strong> {{ $beneficiary->affiliation->indigenous_specify ?? 'N/A' }}</p>
         </div>
 
     <div class="info-section">
         <h4>Family Information</h4>
         <h5>Spouse Information</h5>
         <p><strong>Last Name:</strong> {{ $beneficiary->spouse->spouse_last_name ?? 'N/A' }}</p>
         <p><strong>First Name:</strong> {{ $beneficiary->spouse->spouse_first_name ?? 'N/A' }}</p>
         <p><strong>Middle Name:</strong> {{ $beneficiary->spouse->spouse_middle_name ?? 'N/A' }}</p>
         <p><strong>Name Extension:</strong> {{ $beneficiary->spouse->spouse_name_extension ?? 'N/A' }}</p>
         <p><strong>Spouse Contact:</strong> {{ $beneficiary->spouse->spouse_contact ?? 'N/A' }}</p>
     </div>
 
 
     <div class="info-section">
         <h5>Spouse Address</h5>
         <p><strong>Region:</strong>
             {{ $beneficiary->addresses->where('type', 'spouse_address')->first()->region ?? 'N/A' }}</p>
         <p><strong>Province:</strong>
             {{ $beneficiary->addresses->where('type', 'spouse_address')->first()->province ?? 'N/A' }}</p>
         <p><strong>City:</strong>
             {{ $beneficiary->addresses->where('type', 'spouse_address')->first()->city ?? 'N/A' }}
         </p>
         <p><strong>Barangay:</strong>
             {{ $beneficiary->addresses->where('type', 'spouse_address')->first()->barangay ?? 'N/A' }}</p>
         <p><strong>Sitio:</strong>
             {{ $beneficiary->addresses->where('type', 'spouse_address')->first()->sitio ?? 'N/A' }}
         </p>
     </div>
 
 
     <div class="info-section">
         <h5>Children Information</h5>
         @foreach ($beneficiary->child as $child)
             <p><strong>Name:</strong> {{ $child->children_name ?? 'N/A' }}</p>
             <p><strong>Civil Status:</strong> {{ $child->children_civil_status ?? 'N/A' }}</p>
             <p><strong>Occupation:</strong> {{ $child->children_occupation ?? 'N/A' }}</p>
             <p><strong>Income:</strong> {{ $child->children_income ?? 'N/A' }}</p>
             <p><strong>Contact Number:</strong> {{ $child->children_contact_number ?? 'N/A' }}</p>
             <br>
         @endforeach
     </div>
 
     <div class="info-section">
         <h5>Authorized Representatives Information</h5>
         @foreach ($beneficiary->representative as $representative)
             <p><strong>Name:</strong> {{ $representative->representative_name ?? 'N/A' }}</p>
             <p><strong>Civil Status:</strong> {{ $representative->representative_civil_status ?? 'N/A' }}</p>
             <p><strong>Contact Number:</strong> {{ $representative->representative_contact_number ?? 'N/A' }}</p>
             <br>
         @endforeach
     </div>
 
 
     {{-- <!-- <div class="info-section">
         <h5>Caregiver Information</h5>
         <p><strong>Last Name:</strong> {{ $beneficiary->caregiver->caregiver_last_name ?? 'N/A' }}</p>
         <p><strong>First Name:</strong> {{ $beneficiary->caregiver->caregiver_first_name ?? 'N/A' }}</p>
         <p><strong>Middle Name:</strong> {{ $beneficiary->caregiver->caregiver_middle_name ?? 'N/A' }}</p>
         <p><strong>Name Extension:</strong> {{ $beneficiary->caregiver->caregiver_name_extension ?? 'N/A' }}</p>
         <p><strong>Relationship:</strong> {{ $beneficiary->caregiver->caregiver_relationship ?? 'N/A' }}</p>
         <p><strong>Contact:</strong> {{ $beneficiary->caregiver->caregiver_contact ?? 'N/A' }}</p>
     </div> --> --}}
 
 
     <div class="info-section">
         <h5>Housing and Living Status</h5>
         <p><strong>House Status:</strong> {{ $beneficiary->housingLivingStatus->house_status ?? 'N/A' }}</p>
         <p><strong>House Status (Others):</strong>
             {{ $beneficiary->housingLivingStatus->house_status_others_input ?? 'N/A' }}</p>
         <p><strong>Living Status:</strong> {{ $beneficiary->housingLivingStatus->living_status ?? 'N/A' }}</p>
         <p><strong>Living Status (Others):</strong>
             {{ $beneficiary->housingLivingStatus->living_status_others_input ?? 'N/A' }}</p>
     </div>
 
     <div class="info-section">
         <h5>Economic Information</h5>
         <p><strong>Receiving Pension:</strong> {{ $beneficiary->economicInformation->receiving_pension ?? 'N/A' }}</p>
         <p><strong>Pension Amount:</strong> {{ $beneficiary->economicInformation->pension_amount ?? 'N/A' }}</p>
         <p><strong>Pension Source:</strong> {{ $beneficiary->economicInformation->pension_source ?? 'N/A' }}</p>
         <p><strong>Permanent Income:</strong> {{ $beneficiary->economicInformation->permanent_income ?? 'N/A' }}</p>
         <p><strong>Income Amount:</strong> {{ $beneficiary->economicInformation->income_amount ?? 'N/A' }}</p>
         <p><strong>Income Source:</strong> {{ $beneficiary->economicInformation->income_source ?? 'N/A' }}</p>
         <p><strong>Regular Support:</strong> {{ $beneficiary->economicInformation->regular_support ?? 'N/A' }}</p>
         <p><strong>Support Amount:</strong> {{ $beneficiary->economicInformation->support_amount ?? 'N/A' }}</p>
         <p><strong>Support Source:</strong> {{ $beneficiary->economicInformation->support_source ?? 'N/A' }}</p>
     </div>
 
 
     <div class="info-section">
         <h5>Health Information</h5>
         <p><strong>Existing Illness:</strong> {{ $beneficiary->healthInformation->existing_illness ?? 'N/A' }}</p>
         <p><strong>Illness Specify:</strong> {{ $beneficiary->healthInformation->illness_specify ?? 'N/A' }}</p>
         <p><strong>With Disability:</strong> {{ $beneficiary->healthInformation->with_disability ?? 'N/A' }}</p>
         <p><strong>Disability Specify:</strong> {{ $beneficiary->healthInformation->disability_specify ?? 'N/A' }}</p>
         <p><strong>Difficult ADL:</strong> {{ $beneficiary->healthInformation->difficult_adl ?? 'N/A' }}</p>
         <p><strong>Dependent IADL:</strong> {{ $beneficiary->healthInformation->dependent_iadl ?? 'N/A' }}</p>
         <p><strong>Experience Loss:</strong> {{ $beneficiary->healthInformation->experience_loss ?? 'N/A' }}</p>
     </div>
 
     <div class="info-section">
         <h5>Assessment</h5>
         <p><strong>Assessment Context:</strong> {{ $beneficiary->assessmentRecommendation->remarks ?? 'N/A' }}</p>
     </div>
 
     <div class="info-section">
         <h5>Recommendation</h5>
         <p><strong>Recommendation:</strong> {{ $beneficiary->assessmentRecommendation->eligibility ?? 'N/A' }}</p>
     </div>
 </div>