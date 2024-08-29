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
        border-radius: 10px;
        /* Changed to make the image square */
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
        <form action="{{ route('beneficiary.update', $beneficiary->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="info-section">
                <h5>General Information</h5>
                <p><strong>OSCA ID No:</strong> <input type="text" name="osca_id" value="{{ $beneficiary->osca_id }}">
                </p>
                <p><strong>NCSC RRN:</strong> <input type="text" name="ncsc_rrn"
                        value="{{ $beneficiary->ncsc_rrn }}"></p>
                <p><strong>Status:</strong>
                    <select class="form-select" name="status" required>
                        <option value="ACTIVE" {{ $beneficiary->status == 'ACTIVE' ? 'selected' : '' }}>ACTIVE</option>
                        <option value="WAITLISTED" {{ $beneficiary->status == 'WAITLISTED' ? 'selected' : '' }}>
                            WAITLISTED</option>
                        <option value="SUSPENDED" {{ $beneficiary->status == 'SUSPENDED' ? 'selected' : '' }}>SUSPENDED
                        </option>
                        <option value="UNVALIDATED" {{ $beneficiary->status == 'UNVALIDATED' ? 'selected' : '' }}>
                            UNVALIDATED</option>
                        <option value="NOT LOCATED" {{ $beneficiary->status == 'NOT LOCATED' ? 'selected' : '' }}>NOT
                            LOCATED</option>
                        <option value="DOUBLE ENTRY" {{ $beneficiary->status == 'DOUBLE ENTRY' ? 'selected' : '' }}>
                            DOUBLE ENTRY</option>
                        <option value="TRANSFER OF RESIDENCE"
                            {{ $beneficiary->status == 'TRANSFER OF RESIDENCE' ? 'selected' : '' }}>TRANSFER OF
                            RESIDENCE</option>
                        <option value="RECEIVING SUPPORT FROM THE FAMILY"
                            {{ $beneficiary->status == 'RECEIVING SUPPORT FROM THE FAMILY' ? 'selected' : '' }}>
                            RECEIVING SUPPORT FROM THE FAMILY</option>
                        <option value="RECEIVING PENSION FROM OTHER AGENCY"
                            {{ $beneficiary->status == 'RECEIVING PENSION FROM OTHER AGENCY' ? 'selected' : '' }}>
                            RECEIVING PENSION FROM OTHER AGENCY</option>
                        <option value="WITH PERMANENT INCOME"
                            {{ $beneficiary->status == 'WITH PERMANENT INCOME' ? 'selected' : '' }}>WITH PERMANENT
                            INCOME</option>
                    </select>
                </p>
            </div>

            <div class="info-section">
                <h5>Personal Information</h5>
                <p><strong>Last Name:</strong> <input type="text" name="last_name"
                        value="{{ $beneficiary->BeneficiaryInfo->last_name }}"></p>
                <p><strong>First Name:</strong> <input type="text" name="first_name"
                        value="{{ $beneficiary->BeneficiaryInfo->first_name }}"></p>
                <p><strong>Middle Name:</strong> <input type="text" name="middle_name"
                        value="{{ $beneficiary->BeneficiaryInfo->middle_name }}"></p>
                <p><strong>Name Extension:</strong>
                    <select id="name_extension" name="name_extension" class="form-control" required>
                        <option value="">Choose...</option>
                        <option value="Jr."
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'Jr.' ? 'selected' : '' }}>Jr.</option>
                        <option value="Sr."
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'Sr.' ? 'selected' : '' }}>Sr.</option>
                        <option value="II"
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'II' ? 'selected' : '' }}>II</option>
                        <option value="III"
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'III' ? 'selected' : '' }}>III</option>
                        <option value="IV"
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'IV' ? 'selected' : '' }}>IV</option>
                        <option value="V"
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'V' ? 'selected' : '' }}>V</option>
                        <option value="VI"
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'VI' ? 'selected' : '' }}>VI</option>
                        <option value="VII"
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'VII' ? 'selected' : '' }}>VII</option>
                        <option value="VIII"
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'VIII' ? 'selected' : '' }}>VIII
                        </option>
                        <option value="IX"
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'IX' ? 'selected' : '' }}>IX</option>
                        <option value="X"
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'X' ? 'selected' : '' }}>X</option>
                        <option value="N/A"
                            {{ $beneficiary->BeneficiaryInfo->name_extension == 'N/A' ? 'selected' : '' }}>N/A</option>
                    </select>
                </p>
                <p><strong>Date of Birth:</strong>
                    <input type="date" id="date_of_birth" name="date_of_birth"
                        value="{{ \Carbon\Carbon::parse($beneficiary->MothersMaidenName->date_of_birth)->format('Y-m-d') }}"
                        onchange="calculateAge()">
                </p>
                <p><strong>Age:</strong>
                    <input type="number" id="age" name="age"
                        value="{{ $beneficiary->MothersMaidenName->age }}" min="60" readonly>
                </p>
                <p><strong>Sex:</strong>
                    <select name="sex" id="sex" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male" {{ $beneficiary->MothersMaidenName->sex == 'Male' ? 'selected' : '' }}>
                            Male</option>
                        <option value="Female"
                            {{ $beneficiary->MothersMaidenName->sex == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </p>
                <p><strong>Civil Status:</strong>
                    <select name="civil_status" id="civil_status" class="form-control" required>
                        <option value="">Select Status</option>
                        <option value="Single"
                            {{ $beneficiary->MothersMaidenName->civil_status == 'Single' ? 'selected' : '' }}>Single
                        </option>
                        <option value="Married"
                            {{ $beneficiary->MothersMaidenName->civil_status == 'Married' ? 'selected' : '' }}>Married
                        </option>
                        <option value="Widowed"
                            {{ $beneficiary->MothersMaidenName->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed
                        </option>
                        <option value="Separated"
                            {{ $beneficiary->MothersMaidenName->civil_status == 'Separated' ? 'selected' : '' }}>
                            Separated</option>
                    </select>
                </p>
            </div>

            <div class="info-section">
                <h5>Mother's Maiden Name</h5>
                <p><strong>Last Name:</strong> <input type="text" name="mother_last_name"
                        value="{{ $beneficiary->MothersMaidenName->mother_last_name }}"></p>
                <p><strong>First Name:</strong> <input type="text" name="mother_first_name"
                        value="{{ $beneficiary->MothersMaidenName->mother_first_name }}"></p>
                <p><strong>Middle Name:</strong> <input type="text" name="mother_middle_name"
                        value="{{ $beneficiary->MothersMaidenName->mother_middle_name }}"></p>
            </div>

            <div class="info-section">
                @php
                    $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                    $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                    $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                    $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                @endphp

                <h5>Permanent Address</h5>
                <!-- Display the saved address as plain text -->
                <div id="address-display">
                    <p><strong>Region:</strong> <input type="text" name="permanent_region"
                            value="{{ $beneficiary->addresses->where('type', 'permanent')->first()->region ?? 'N/A' }}">
                    </p>
                    <p><strong>Province:</strong> <input type="text" name="permanent_province"
                            value="{{ $beneficiary->addresses->where('type', 'permanent')->first()->province ?? 'N/A' }}">
                    </p>
                    <p><strong>City:</strong> <input type="text" name="permanent_city"
                            value="{{ $beneficiary->addresses->where('type', 'permanent')->first()->city ?? 'N/A' }}">
                    </p>
                    <p><strong>Barangay:</strong> <input type="text" name="permanent_barangay"
                            value="{{ $beneficiary->addresses->where('type', 'permanent')->first()->barangay ?? 'N/A' }}">
                    </p>
                    <p><strong>Sitio:</strong> <input type="text" name="permanent_sitio"
                            value="{{ $beneficiary->addresses->where('type', 'permanent')->first()->sitio ?? 'N/A' }}">
                    </p>
                    <button type="button" class="btn btn-primary mt-2" id="edit-address-btn">Edit Address</button>
                </div>

                <!-- Address edit form, hidden by default -->
                <div id="address-edit-form" class="form-group mt-3" style="display: none;">
                    <div class="form-row">
                        <div class="col-md-2">
                            <select class="form-control" id="permanent_address_region"
                                name="permanent_address_region" required>
                                <option value="">Select Region</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->psgc }}"
                                        {{ $region->psgc == ($beneficiary->addresses->where('type', 'permanent')->first()->region ?? '') ? 'selected' : '' }}>
                                        {{ $region->col_region }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="permanent_address_province"
                                name="permanent_address_province" required>
                                <option value="">Select Province</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->psgc }}"
                                        {{ $province->psgc == ($beneficiary->addresses->where('type', 'permanent')->first()->province ?? '') ? 'selected' : '' }}>
                                        {{ $province->col_province }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="permanent_address_city" name="permanent_address_city"
                                required>
                                <option value="">Select City/Municipality</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->psgc }}"
                                        {{ $city->psgc == ($beneficiary->addresses->where('type', 'permanent')->first()->city ?? '') ? 'selected' : '' }}>
                                        {{ $city->col_citymuni }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="permanent_address_barangay"
                                name="permanent_address_barangay" required>
                                <option value="">Select Barangay</option>
                                @foreach ($barangays as $barangay)
                                    <option value="{{ $barangay->psgc }}"
                                        {{ $barangay->psgc == ($beneficiary->addresses->where('type', 'permanent')->first()->barangay ?? '') ? 'selected' : '' }}>
                                        {{ $barangay->col_brgy }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="permanent_address_sitio"
                                placeholder="Sitio/House No./Purok/Street"
                                value="{{ $beneficiary->addresses->where('type', 'permanent')->first()->sitio ?? '' }}"
                                required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mt-2" id="cancel-edit-btn">Cancel</button>
                </div>
            </div>



            <div class="info-section">
                @php
                    $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                    $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                    $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                    $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                @endphp

                <h5>Present Address</h5>

                <!-- Display the saved address as plain text -->
                <div id="present-address-display">
                    <h5>Present Address</h5>
                    <p><strong>Region:</strong> <input type="text" name="present_region"
                            value="{{ $beneficiary->addresses->where('type', 'present')->first()->region ?? 'N/A' }}">
                    </p>
                    <p><strong>Province:</strong> <input type="text" name="present_province"
                            value="{{ $beneficiary->addresses->where('type', 'present')->first()->province ?? 'N/A' }}">
                    </p>
                    <p><strong>City:</strong> <input type="text" name="present_city"
                            value="{{ $beneficiary->addresses->where('type', 'present')->first()->city ?? 'N/A' }}">
                    </p>
                    <p><strong>Barangay:</strong> <input type="text" name="present_barangay"
                            value="{{ $beneficiary->addresses->where('type', 'present')->first()->barangay ?? 'N/A' }}">
                    </p>
                    <p><strong>Sitio:</strong> <input type="text" name="present_sitio"
                            value="{{ $beneficiary->addresses->where('type', 'present')->first()->sitio ?? 'N/A' }}">
                    </p>
                    <button type="button" class="btn btn-primary mt-2" id="edit-present-address-btn">Edit
                        Address</button>
                </div>

                <!-- Address edit form, hidden by default -->
                <div id="present-address-edit-form" class="form-group mt-3" style="display: none;">
                    <div class="form-row">
                        <div class="col-md-2">
                            <select class="form-control" id="present_address_region" name="present_address_region"
                                required>
                                <option value="">Select Region</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->psgc }}"
                                        {{ $region->psgc == ($beneficiary->addresses->where('type', 'present')->first()->region ?? '') ? 'selected' : '' }}>
                                        {{ $region->col_region }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="present_address_province"
                                name="present_address_province" required>
                                <option value="">Select Province</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->psgc }}"
                                        {{ $province->psgc == ($beneficiary->addresses->where('type', 'present')->first()->province ?? '') ? 'selected' : '' }}>
                                        {{ $province->col_province }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="present_address_city" name="present_address_city"
                                required>
                                <option value="">Select City/Municipality</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->psgc }}"
                                        {{ $city->psgc == ($beneficiary->addresses->where('type', 'present')->first()->city ?? '') ? 'selected' : '' }}>
                                        {{ $city->col_citymuni }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="present_address_barangay"
                                name="present_address_barangay" required>
                                <option value="">Select Barangay</option>
                                @foreach ($barangays as $barangay)
                                    <option value="{{ $barangay->psgc }}"
                                        {{ $barangay->psgc == ($beneficiary->addresses->where('type', 'present')->first()->barangay ?? '') ? 'selected' : '' }}>
                                        {{ $barangay->col_brgy }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="present_address_sitio"
                                placeholder="Sitio/House No./Purok/Street"
                                value="{{ $beneficiary->addresses->where('type', 'present')->first()->sitio ?? '' }}"
                                required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mt-2"
                        id="cancel-present-edit-btn">Cancel</button>
                </div>
            </div>


            <div class="info-section">
                <h5>Affiliation</h5>
                <p><strong>Affiliation Type:</strong> <input type="text" name="affiliation_type"
                        value="{{ $beneficiary->affiliation->affiliation_type ?? 'N/A' }}"></p>
                <p><strong>Household ID:</strong> <input type="text" name="hh_id"
                        value="{{ $beneficiary->affiliation->hh_id ?? 'N/A' }}"></p>
                <p><strong>Indigenous Specify:</strong> <input type="text" name="indigenous_specify"
                        value="{{ $beneficiary->affiliation->indigenous_specify ?? 'N/A' }}"></p>

            
                            <!-- Checkbox for Listahanan -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="affiliation[]" id="listahanan" value="Listahanan"
                                    {{ in_array('Listahanan', explode(',', $beneficiary->affiliation->affiliation_type ?? '')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="listahanan">Listahanan</label>
                            </div>
                            
                            <!-- Checkbox for Pantawid Beneficiary -->
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="affiliation[]" id="pantawid" value="Pantawid Beneficiary"
                                    {{ in_array('Pantawid Beneficiary', explode(',', $beneficiary->affiliation->affiliation_type ?? '')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="pantawid">Pantawid Beneficiary (Benepisyaryo ng 4Ps)</label>
                            </div>
                            
                            <!-- HH ID field (conditionally shown) -->
                            <div class="form-group mt-2" id="hh_id_group" style="display: {{ in_array('Pantawid Beneficiary', explode(',', $beneficiary->affiliation->affiliation_type ?? '')) ? 'block' : 'none' }};">
                                <label for="hh_id">Specify HH ID (Itala):</label>
                                <input type="text" class="form-control" name="hh_id" id="hh_id" value="{{ $beneficiary->affiliation->hh_id ?? '' }}">
                            </div>
                            
                            <!-- Checkbox for Indigenous People -->
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="affiliation[]" id="indigenous" value="Indigenous People"
                                    {{ in_array('Indigenous People', explode(',', $beneficiary->affiliation->affiliation_type ?? '')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="indigenous">Indigenous People (Mga Katutubo)</label>
                            </div>
                            
                            <!-- Indigenous Specify field (conditionally shown) -->
                            <div class="form-group mt-2" id="indigenous_specify_group" style="display: {{ in_array('Indigenous People', explode(',', $beneficiary->affiliation->affiliation_type ?? '')) ? 'block' : 'none' }};">
                                <label for="indigenous_specify">Specify (Itala):</label>
                                <input type="text" class="form-control" name="indigenous_specify" id="indigenous_specify" value="{{ $beneficiary->affiliation->indigenous_specify ?? '' }}">
                            </div>
                        </div>
                        
            </div>

            <div class="info-section">
                <h4>Family Information</h4>
                <h5>Spouse Information</h5>
                <p><strong>Last Name:</strong> <input type="text" name="spouse_last_name"
                        value="{{ $beneficiary->spouse->spouse_last_name ?? 'N/A' }}"></p>
                <p><strong>First Name:</strong> <input type="text" name="spouse_first_name"
                        value="{{ $beneficiary->spouse->spouse_first_name ?? 'N/A' }}"></p>
                <p><strong>Middle Name:</strong> <input type="text" name="spouse_middle_name"
                        value="{{ $beneficiary->spouse->spouse_middle_name ?? 'N/A' }}"></p>
                <p><strong>Name Extension:</strong> <input type="text" name="spouse_name_extension"
                        value="{{ $beneficiary->spouse->spouse_name_extension ?? 'N/A' }}"></p>
            </div>

            <div class="info-section">
                <h5>Spouse Address</h5>
                <p><strong>Region:</strong> <input type="text" name="spouse_region"
                        value="{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->region ?? 'N/A' }}">
                </p>
                <p><strong>Province:</strong> <input type="text" name="spouse_province"
                        value="{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->province ?? 'N/A' }}">
                </p>
                <p><strong>City:</strong> <input type="text" name="spouse_city"
                        value="{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->city ?? 'N/A' }}">
                </p>
                <p><strong>Barangay:</strong> <input type="text" name="spouse_barangay"
                        value="{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->barangay ?? 'N/A' }}">
                </p>
                <p><strong>Sitio:</strong> <input type="text" name="spouse_sitio"
                        value="{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->sitio ?? 'N/A' }}">
                </p>
            </div>

            <div class="info-section">
                <h5>Children Information</h5>
                @foreach ($beneficiary->child as $child)
                    <p><strong>Name:</strong> <input type="text" name="children_name[]"
                            value="{{ $child->children_name ?? 'N/A' }}"></p>
                    <p><strong>Civil Status:</strong> <input type="text" name="children_civil_status[]"
                            value="{{ $child->children_civil_status ?? 'N/A' }}"></p>
                    <p><strong>Occupation:</strong> <input type="text" name="children_occupation[]"
                            value="{{ $child->children_occupation ?? 'N/A' }}"></p>
                    <p><strong>Income:</strong> <input type="text" name="children_income[]"
                            value="{{ $child->children_income ?? 'N/A' }}"></p>
                    <p><strong>Contact Number:</strong> <input type="text" name="children_contact_number[]"
                            value="{{ $child->children_contact_number ?? 'N/A' }}"></p>
                    <br>
                @endforeach
            </div>

            <div class="info-section">
                <h5>Authorized Representatives Information</h5>
                @foreach ($beneficiary->representative as $representative)
                    <p><strong>Name:</strong> <input type="text" name="representative_name[]"
                            value="{{ $representative->representative_name ?? 'N/A' }}"></p>
                    <p><strong>Civil Status:</strong> <input type="text" name="representative_civil_status[]"
                            value="{{ $representative->representative_civil_status ?? 'N/A' }}"></p>
                    <p><strong>Contact Number:</strong> <input type="text" name="representative_contact_number[]"
                            value="{{ $representative->representative_contact_number ?? 'N/A' }}"></p>
                    <br>
                @endforeach
            </div>


            <div class="info-section">
                <h5>Caregiver Information</h5>
                <p><strong>Last Name:</strong> <input type="text" name="caregiver_last_name"
                        value="{{ $beneficiary->caregiver->caregiver_last_name ?? 'N/A' }}"></p>
                <p><strong>First Name:</strong> <input type="text" name="caregiver_first_name"
                        value="{{ $beneficiary->caregiver->caregiver_first_name ?? 'N/A' }}"></p>
                <p><strong>Middle Name:</strong> <input type="text" name="caregiver_middle_name"
                        value="{{ $beneficiary->caregiver->caregiver_middle_name ?? 'N/A' }}"></p>
                <p><strong>Name Extension:</strong> <input type="text" name="caregiver_name_extension"
                        value="{{ $beneficiary->caregiver->caregiver_name_extension ?? 'N/A' }}"></p>
                <p><strong>Relationship:</strong> <input type="text" name="caregiver_relationship"
                        value="{{ $beneficiary->caregiver->caregiver_relationship ?? 'N/A' }}"></p>
                <p><strong>Contact:</strong> <input type="text" name="caregiver_contact"
                        value="{{ $beneficiary->caregiver->caregiver_contact ?? 'N/A' }}"></p>
            </div>

            <div class="info-section">
                <h5>Housing and Living Status</h5>
                <p><strong>House Status:</strong> <input type="text" name="house_status"
                        value="{{ $beneficiary->housingLivingStatus->house_status ?? 'N/A' }}"></p>
                <p><strong>House Status (Others):</strong> <input type="text" name="house_status_others_input"
                        value="{{ $beneficiary->housingLivingStatus->house_status_others_input ?? 'N/A' }}"></p>
                <p><strong>Living Status:</strong> <input type="text" name="living_status"
                        value="{{ $beneficiary->housingLivingStatus->living_status ?? 'N/A' }}"></p>
                <p><strong>Living Status (Others):</strong> <input type="text" name="living_status_others_input"
                        value="{{ $beneficiary->housingLivingStatus->living_status_others_input ?? 'N/A' }}"></p>
            </div>

            <div class="info-section">
                <h5>Economic Information</h5>
                <p><strong>Receiving Pension:</strong> <input type="text" name="receiving_pension"
                        value="{{ $beneficiary->economicInformation->receiving_pension ?? 'N/A' }}"></p>
                <p><strong>Pension Amount:</strong> <input type="text" name="pension_amount"
                        value="{{ $beneficiary->economicInformation->pension_amount ?? 'N/A' }}"></p>
                <p><strong>Pension Source:</strong> <input type="text" name="pension_source"
                        value="{{ $beneficiary->economicInformation->pension_source ?? 'N/A' }}"></p>
                <p><strong>Permanent Income:</strong> <input type="text" name="permanent_income"
                        value="{{ $beneficiary->economicInformation->permanent_income ?? 'N/A' }}"></p>
                <p><strong>Income Amount:</strong> <input type="text" name="income_amount"
                        value="{{ $beneficiary->economicInformation->income_amount ?? 'N/A' }}"></p>
                <p><strong>Income Source:</strong> <input type="text" name="income_source"
                        value="{{ $beneficiary->economicInformation->income_source ?? 'N/A' }}"></p>
                <p><strong>Regular Support:</strong> <input type="text" name="regular_support"
                        value="{{ $beneficiary->economicInformation->regular_support ?? 'N/A' }}"></p>
                <p><strong>Support Amount:</strong> <input type="text" name="support_amount"
                        value="{{ $beneficiary->economicInformation->support_amount ?? 'N/A' }}"></p>
                <p><strong>Support Source:</strong> <input type="text" name="support_source"
                        value="{{ $beneficiary->economicInformation->support_source ?? 'N/A' }}"></p>
            </div>

            <div class="info-section">
                <h5>Health Information</h5>
                <p><strong>Existing Illness:</strong> <input type="text" name="existing_illness"
                        value="{{ $beneficiary->healthInformation->existing_illness ?? 'N/A' }}"></p>
                <p><strong>Illness Specify:</strong> <input type="text" name="illness_specify"
                        value="{{ $beneficiary->healthInformation->illness_specify ?? 'N/A' }}"></p>
                <p><strong>With Disability:</strong> <input type="text" name="with_disability"
                        value="{{ $beneficiary->healthInformation->with_disability ?? 'N/A' }}"></p>
                <p><strong>Disability Specify:</strong> <input type="text" name="disability_specify"
                        value="{{ $beneficiary->healthInformation->disability_specify ?? 'N/A' }}"></p>
                <p><strong>Difficult ADL:</strong> <input type="text" name="difficult_adl"
                        value="{{ $beneficiary->healthInformation->difficult_adl ?? 'N/A' }}"></p>
                <p><strong>Dependent IADL:</strong> <input type="text" name="dependent_iadl"
                        value="{{ $beneficiary->healthInformation->dependent_iadl ?? 'N/A' }}"></p>
                <p><strong>Experience Loss:</strong> <input type="text" name="experience_loss"
                        value="{{ $beneficiary->healthInformation->experience_loss ?? 'N/A' }}"></p>
            </div>

            <div class="info-section">
                <h5>Assessment</h5>
                <p><strong>Assessment Context:</strong> <input type="text" name="assessment_context"
                        value="{{ $beneficiary->assessmentRecommendation->remarks ?? 'N/A' }}"></p>
            </div>

            <div class="info-section">
                <h5>Recommendation</h5>
                <p><strong>Recommendation:</strong> <input type="text" name="recommendation"
                        value="{{ $beneficiary->assessmentRecommendation->eligibility ?? 'N/A' }}"></p>
            </div>

            <div class="modal-footer">
                <button type="submit" class="close-button">Save</button>
            </div>
        </form>
    </div>
</div>


<script>
    //Permanent Address
    $(document).ready(function() {
        // Handle the Edit Address button click
        $('#edit-address-btn').click(function() {
            // Show the address edit form
            $('#address-display').hide();
            $('#address-edit-form').show();

            // Now attach the change events for the dropdowns after the form is shown

            // Fetch Provinces based on selected Region
            $('#permanent_address_region').change(function() {
                var regionPsgc = $(this).val();
                if (regionPsgc) {
                    $.ajax({
                        url: '/address/provinces/' + regionPsgc,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#permanent_address_province').empty().append(
                                '<option value="">Select Province</option>');
                            $('#permanent_address_city').empty().append(
                                '<option value="">Select City/Municipality</option>'
                            );
                            $('#permanent_address_barangay').empty().append(
                                '<option value="">Select Barangay</option>');
                            $.each(data, function(key, value) {
                                $('#permanent_address_province').append(
                                    '<option value="' + value.psgc +
                                    '">' + value.col_province +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#permanent_address_province').empty().append(
                        '<option value="">Select Province</option>');
                    $('#permanent_address_city').empty().append(
                        '<option value="">Select City/Municipality</option>');
                    $('#permanent_address_barangay').empty().append(
                        '<option value="">Select Barangay</option>');
                }
            });

            // Fetch Cities based on selected Province
            $('#permanent_address_province').change(function() {
                var provincePsgc = $(this).val();
                if (provincePsgc) {
                    $.ajax({
                        url: '/address/cities/' + provincePsgc,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#permanent_address_city').empty().append(
                                '<option value="">Select City/Municipality</option>'
                            );
                            $('#permanent_address_barangay').empty().append(
                                '<option value="">Select Barangay</option>');
                            $.each(data, function(key, value) {
                                $('#permanent_address_city').append(
                                    '<option value="' + value.psgc +
                                    '">' + value.col_citymuni +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#permanent_address_city').empty().append(
                        '<option value="">Select City/Municipality</option>');
                    $('#permanent_address_barangay').empty().append(
                        '<option value="">Select Barangay</option>');
                }
            });

            // Fetch Barangays based on selected City
            $('#permanent_address_city').change(function() {
                var cityMuniPsgc = $(this).val();
                if (cityMuniPsgc) {
                    $.ajax({
                        url: '/address/barangays/' + cityMuniPsgc,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#permanent_address_barangay').empty().append(
                                '<option value="">Select Barangay</option>');
                            $.each(data, function(key, value) {
                                $('#permanent_address_barangay').append(
                                    '<option value="' + value.psgc +
                                    '">' + value.col_brgy + '</option>');
                            });
                        }
                    });
                } else {
                    $('#permanent_address_barangay').empty().append(
                        '<option value="">Select Barangay</option>');
                }
            });
        });

        // Handle the Cancel Edit button click
        $('#cancel-edit-btn').click(function() {
            // Hide the address edit form
            $('#address-edit-form').hide();
            $('#address-display').show();
        });
    });

    //Present Address
    $(document).ready(function() {
        // Handle the Edit Present Address button click
        $('#edit-present-address-btn').click(function() {
            // Show the present address edit form
            $('#present-address-display').hide();
            $('#present-address-edit-form').show();

            // Now attach the change events for the dropdowns after the form is shown

            // Fetch Provinces based on selected Region
            $('#present_address_region').change(function() {
                var regionPsgc = $(this).val();
                if (regionPsgc) {
                    $.ajax({
                        url: '/address/provinces/' + regionPsgc,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#present_address_province').empty().append(
                                '<option value="">Select Province</option>');
                            $('#present_address_city').empty().append(
                                '<option value="">Select City/Municipality</option>'
                                );
                            $('#present_address_barangay').empty().append(
                                '<option value="">Select Barangay</option>');
                            $.each(data, function(key, value) {
                                $('#present_address_province').append(
                                    '<option value="' + value.psgc +
                                    '">' + value.col_province +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#present_address_province').empty().append(
                        '<option value="">Select Province</option>');
                    $('#present_address_city').empty().append(
                        '<option value="">Select City/Municipality</option>');
                    $('#present_address_barangay').empty().append(
                        '<option value="">Select Barangay</option>');
                }
            });

            // Fetch Cities based on selected Province
            $('#present_address_province').change(function() {
                var provincePsgc = $(this).val();
                if (provincePsgc) {
                    $.ajax({
                        url: '/address/cities/' + provincePsgc,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#present_address_city').empty().append(
                                '<option value="">Select City/Municipality</option>'
                                );
                            $('#present_address_barangay').empty().append(
                                '<option value="">Select Barangay</option>');
                            $.each(data, function(key, value) {
                                $('#present_address_city').append(
                                    '<option value="' + value.psgc +
                                    '">' + value.col_citymuni +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#present_address_city').empty().append(
                        '<option value="">Select City/Municipality</option>');
                    $('#present_address_barangay').empty().append(
                        '<option value="">Select Barangay</option>');
                }
            });

            // Fetch Barangays based on selected City
            $('#present_address_city').change(function() {
                var cityMuniPsgc = $(this).val();
                if (cityMuniPsgc) {
                    $.ajax({
                        url: '/address/barangays/' + cityMuniPsgc,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#present_address_barangay').empty().append(
                                '<option value="">Select Barangay</option>');
                            $.each(data, function(key, value) {
                                $('#present_address_barangay').append(
                                    '<option value="' + value.psgc +
                                    '">' + value.col_brgy + '</option>');
                            });
                        }
                    });
                } else {
                    $('#present_address_barangay').empty().append(
                        '<option value="">Select Barangay</option>');
                }
            });
        });

        // Handle the Cancel Present Edit button click
        $('#cancel-present-edit-btn').click(function() {
            // Hide the present address edit form
            $('#present-address-edit-form').hide();
            $('#present-address-display').show();
        });
    });
    
    //Affiliation
    $(document).ready(function() {
    // Show/hide the HH ID input field based on the Pantawid Beneficiary checkbox
    $('#pantawid').change(function() {
        if ($(this).is(':checked')) {
            $('#hh_id_group').show();
        } else {
            $('#hh_id_group').hide();
        }
    });

    // Show/hide the Indigenous Specify input field based on the Indigenous People checkbox
    $('#indigenous').change(function() {
        if ($(this).is(':checked')) {
            $('#indigenous_specify_group').show();
        } else {
            $('#indigenous_specify_group').hide();
        }
    });

    // Trigger the change event on page load to set the initial state
    $('#pantawid').trigger('change');
    $('#indigenous').trigger('change');
});


    //Age
    function calculateAge() {
        const dob = document.getElementById('date_of_birth').value;
        const dobDate = new Date(dob);
        const today = new Date();
        let age = today.getFullYear() - dobDate.getFullYear();
        const monthDifference = today.getMonth() - dobDate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dobDate.getDate())) {
            age--;
        }
        if (age >= 60) {
            document.getElementById('age').value = age;
        } else {
            document.getElementById('age').value = '';
            alert('Age must be 60 or above.');
        }
    }

    // Initial calculation if the date of birth is already set
    window.onload = function() {
        calculateAge();
    };
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
