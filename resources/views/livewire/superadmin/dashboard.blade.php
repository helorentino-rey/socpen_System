@extends('layouts.superadmin')

@section('title', 'Dashboard')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 900px;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .section-title {
        background-color: #2c6fbb;
        color: #fff;
        padding: 10px;
        border-radius: 3px;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .notice-text {
        color: #d9534f;
        font-size: 14px;
        line-height: 1.5;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        height: 30px;
        font-size: 10px;
    }

    .form-check-label {
        font-size: 12px;
    }

    .check-age-link {
        font-size: 14px;
        color: #28a745;
        text-decoration: none;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-row>.col-md-3,
    .form-row>.col-md-2,
    .form-row>.col-md-6 {
        padding-right: 10px;
        padding-left: 10px;
    }

    .form-row>.col-md-1,
    .form-row>.col-md-4,
    .form-row>.col-md-5 {
        padding-right: 5px;
        padding-left: 5px;
    }

    .text-danger {
        color: #d9534f !important;
        font-size: 13px;
    }

    a {
        text-decoration: none;
        cursor: pointer;
    }

    a:hover {
        text-decoration: underline;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        text-align: left;
    }

    .table th {
        font-weight: bold;
        background-color: #f8f9fa;
    }

    .table td {
        border-top: 1px solid #dee2e6;
        vertical-align: middle;
    }

    .input-group-text {
        background-color: #ffffff;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 14px;
        padding: 5px;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        margin: 10px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

</head>

<body>
    <div class="container mt-5">
        <!-- Form Section -->
        <form>
            <h4 class="section-title mb-3">I. IDENTIFYING INFORMATION (Pagkilala ng Impormasyon)</h4>
            <!-- Name Section -->
            <div class="form-group">
                <label><strong>1. Name - </strong> Enter your name correctly</label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="last_name">Last Name *</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="first_name">First Name *</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="middle_name">Middle Name </label>
                        <input type="text" class="form-control" name="middle_name" id="middle_name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="name_extension">Name Extension *</label>
                        <select id="name_extension" name="name_extension" class="form-control" required>
                            <option value="">Choose...</option>
                            <option value="Jr.">Jr.</option>
                            <option value="Sr.">Sr.</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                            <option value="VI">VI</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                            <option value="X">X</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label><strong>2. Mother's Maiden Name</strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="mother_last_name">Last Name *</label>
                        <input type="text" class="form-control" name="mother_last_name" id="mother_last_name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="mother_first_name">First Name *</label>
                        <input type="text" class="form-control" name="mother_first_name" id="mother_first_name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="mother_middle_name">Middle Name </label>
                        <input type="text" class="form-control" name="middle_name" id="middle_name">
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="form-group mt-4">
                <label><strong>3. Permanent Address - </strong> Select region first, then province, then city, and finally your barangay</label>
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        @php
                        $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                        $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                        $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                        $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                        @endphp
                        <label for="region">Region *</label>
                        <select class="form-control" id="permanent_address_region"
                            name="permanent_address_region" required>
                            <option value="">Select Region</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->psgc }}">{{ $region->col_region }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="province">Province *</label>
                        <select class="form-control" id="permanent_address_province"
                            name="permanent_address_province" required>
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->psgc }}">{{ $province->col_province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="city">City *</label>
                        <select class="form-control" id="permanent_address_city" name="permanent_address_city"
                            required>
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->psgc }}">{{ $city->col_citymuni }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="barangay">Barangay *</label>
                        <select class="form-control" id="permanent_address_barangay"
                            name="permanent_address_barangay" required>
                            <option value="">Select Barangay</option>
                            @foreach ($barangays as $barangay)
                            <option value="{{ $barangay->psgc }}">{{ $barangay->col_brgy }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="residence">Sitio/House No./Purok/Street *</label>
                        <input type="text" class="form-control" name="permanent_address_sitio"
                            placeholder="Sitio/House No./Purok/Street" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="residence">Sitio/House No./Purok/Street *</label>
                        <input type="text" class="form-control" name="permanent_address_sitio"
                            placeholder="Sitio/House No./Purok/Street" required>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <label><strong>4. Present Address - </strong> Select region first, then province, then city, and finally your barangay</label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        @php
                        $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                        $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                        $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                        $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                        @endphp
                        <label for="region">Region *</label>
                        <select class="form-control" id="present_address_region" name="present_address_region"
                            required>
                            <option value="">Select Region</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->psgc }}">{{ $region->col_region }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="province">Province *</label>
                        <select class="form-control" id="present_address_province"
                            name="present_address_province" required>
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->psgc }}">{{ $province->col_province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="city">City *</label>
                        <select class="form-control" id="present_address_city" name="present_address_city"
                            required>
                            <option value="">Select City/Municipality</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->psgc }}">{{ $city->col_citymuni }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="barangay">Barangay *</label>
                        <select class="form-control" id="present_address_barangay"
                            name="present_address_barangay" required>
                            <option value="">Select Barangay</option>
                            @foreach ($barangays as $barangay)
                            <option value="{{ $barangay->psgc }}">{{ $barangay->col_brgy }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="residence">Sitio/House No./Purok/Street *</label>
                        <input type="text" class="form-control" name="present_address_sitio"
                            placeholder="Sitio/House No./Purok/Street" required>
                    </div>
                </div>
            </div>

            <!-- Birth Date Section -->
            <div class="form-group mt-4">
                <label><strong>5. Birth Date - </strong> Indicate your birth date correctly</label>
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="birthMonth">Month *</label>
                        <select class="form-control" id="birthMonth">
                            <!-- Month options -->
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="birthDate">Date *</label>
                        <select class="form-control" id="birthDate">
                            <!-- Date options -->
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="birthYear">Year *</label>
                        <select class="form-control" id="birthYear">
                            <!-- Year options -->
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <label for="place_of_birth"><strong>6. Place of Birth </strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="place_of_birth_city">City/Municipality</label>
                        <input type="text" class="form-control" name="place_of_birth_city"
                            id="place_of_birth_city" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="place_of_birth_city">Province *</label>
                        <input type="text" class="form-control" name="place_of_birth_province"
                            id="place_of_birth_province" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label><strong>7. Age</strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="age"></label>
                        <input type="number" class="form-control" name="age" id="age" required readonly>
                    </div>
                </div>
            </div>
            <h4 class="section-title mb-3">II. FAMILY INFORMATION (Impormasyon ng Pamilya)</h4>
            <div class="form-group">
                <label><strong>11. Name of Spouse - </strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="spouse_last_name">Lastname *</label>
                        <input type="text" class="form-control" name="spouse_last_name" id="spouse_last_name"
                            required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="spouse_first_name">First Name *</label>
                        <input type="text" class="form-control" name="spouse_first_name"
                            id="spouse_first_name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="spouse_middle_name">Middle Name </label>
                        <input type="text" class="form-control" name="spouse_middle_name"
                            id="spouse_middle_name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="name_extension">Name Extension *</label>
                        <select id="spouse_name_extension" name="spouse_name_extension" class="form-control"
                            required>
                            <option value="">Choose...</option>
                            <option value="Jr.">Jr.</option>
                            <option value="Sr.">Sr.</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                            <option value="VI">VI</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                            <option value="X">X</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group mt-4">
                <label><strong>12. Spouse Address - </strong> Select region first, then province, then city, and finally your barangay</label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="region">Region *</label>
                        <select class="form-control" id="spouse_address_region" name="spouse_address_region"
                            required>
                            <option value="">Select Region</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->psgc }}">{{ $region->col_region }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="province">Province *</label>
                        <select class="form-control" id="spouse_address_province" name="spouse_address_province"
                            required>
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->psgc }}">{{ $province->col_province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="city">City *</label>
                        <select class="form-control" id="spouse_address_city" name="spouse_address_city"
                            required>
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->psgc }}">{{ $city->col_citymuni }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="barangay">Barangay *</label>
                        <select class="form-control" id="spouse_address_barangay" name="spouse_address_barangay"
                            required>
                            <option value="">Select Barangay</option>
                            @foreach ($barangays as $barangay)
                            <option value="{{ $barangay->psgc }}">{{ $barangay->col_brgy }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="residence">Sitio/House No./Purok/Street *</label>
                        <input type="text" class="form-control" id="spouse_address_sitio"
                            name="spouse_address_sitio" placeholder="Sitio/House No./Purok/Street" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label><strong>13. Contact Number</strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="lastname"></label>
                        <input type="text" class="form-control" id="lastname">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label><strong>14. Children </strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="lastname">Name *</label>
                        <input type="text" class="form-control" id="lastname">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="birthCity">Civil Status *</label>
                        <select class="form-control" id="civilStatus">
                            <!-- Month options -->
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="middlename">Occupation *</label>
                        <input type="text" class="form-control" id="middlename">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="middlename">Income *</label>
                        <input type="text" class="form-control" id="middlename">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="middlename">Contact Number *</label>
                        <input type="text" class="form-control" id="middlename">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label><strong>15. Name of Authorized Representatives </strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="lastname">Name *</label>
                        <input type="text" class="form-control" id="lastname">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="birthCity">Civil Status *</label>
                        <select class="form-control" id="civilStatus">
                            <!-- Month options -->
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="middlename">Contact Number *</label>
                        <input type="text" class="form-control" id="middlename">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label><strong>16. Name of Caregiver </strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="last_name">Last Name *</label>
                        <input type="text" class="form-control" name="caregiver_last_name"
                            id="caregiver_last_name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="first_name">First Name *</label>
                        <input type="text" class="form-control" name="caregiver_first_name"
                            id="caregiver_first_name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" name="caregiver_middle_name"
                            id="caregiver_middle_name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="name_extension">Name Extension *</label>
                        <select id="caregiver_name_extension" name="caregiver_name_extension" class="form-control">
                            <option value="">Choose...</option>
                            <option value="Jr.">Jr.</option>
                            <option value="Sr.">Sr.</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                            <option value="VI">VI</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                            <option value="X">X</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label><strong>17. Relationship</strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="spouse_contact">RELATIONSHIP (to Beneficiary)</label>
                        <input type="text" class="form-control" name="caregiver_relationship"
                            id="caregiver_relationship">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label><strong>18. Contact Number</strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="caregiver_contact"></label>
                        <input type="text" class="form-control" name="caregiver_contact" id="caregiver_contact">
                    </div>
                </div>
            </div>
            <h4 class="section-title mb-3">III. ECONOMIC INFORMATION (Impormasyong Pang-ekonomiya)</h4>
            <div class="form-group">
                <label><strong>18. Contact Number</strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="lastname"></label>
                        <input type="text" class="form-control" id="lastname">
                    </div>
                </div>
            </div>
            <h4 class="section-title mb-3">IV. HEALTH INFORMATION (Impormasyon sa Kalusugan)</h4>
            <div class="form-group">
                <label><strong>18. Contact Number</strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="lastname"></label>
                        <input type="text" class="form-control" id="lastname">
                    </div>
                </div>
            </div>
            <h4 class="section-title mb-3">VI. RECOMMENDATION (Rekomendasyon)</h4>
            <div class="form-group">
                <label><strong>18. Contact Number</strong></label>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="lastname"></label>
                        <input type="text" class="form-control" id="lastname">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

@endsection