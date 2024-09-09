<style>
    .container {
        width: calc(100% - 300px);
        /* Adjust this width based on your sidebar's width */
        max-width: none;
        margin-left: 150px;
        /* Aligns content with the sidebar */
        padding: 20px;
        box-sizing: border-box;
    }

    .card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 100%;
    }

    .card-body {
        padding: 2rem;
    }

    .card-title {
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-label {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
        width: 100%;
        padding: 0.75rem;
        font-size: 1.1rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        margin-bottom: 1rem;
    }

    .form-select {
        appearance: none;

        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 8px 10px;
    }

    .form-row {
        display: flex;
        justify-content: space-between;
    }

    .form-col {
        flex: 1;
        padding: 0 0.5rem;
    }

    .form-col:first-child {
        padding-left: 0;
    }

    .form-col:last-child {
        padding-right: 0;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        color: #fff;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        background-color: #1C4CB1;
        border: none;
        padding: 0.75rem;
        font-size: 1.2rem;
        border-radius: 0.25rem;
        width: 100%;
        transition: background-color 0.15s ease-in-out;
    }

    .btn:hover {
        background-color: #163a8c;
    }

    .mt-4 {
        margin-top: 1.5rem;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .income-table {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 10px;
    }

    .income-header,
    .income-row {
        display: contents;
    }

    .income-header div {
        font-weight: bold;
        padding: 5px;
        border-bottom: 1px solid #ccc;
    }

    .income-row div {
        padding: 5px;
    }

    .income-row {
        border-bottom: 1px solid #eee;
    }

    .income-row input[type="text"] {
        width: 100%;
        box-sizing: border-box;
    }

    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .profile-pic {
        width: 100px;
        height: 100px;
        background: #ccc;
        margin-right: 1rem;
    }

    .profile-info {
        flex: 1;
    }

    .profile-details {
        display: flex;
        justify-content: space-between;
    }

    .file-input {
        display: none;
    }

    .signature-box {
        border: 1px solid #ccc;
        padding: 0.5rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100px;
        width: 100%;
    }

    .navbar {
        background-color: #f8f9fa;
        border-bottom: 2px solid #343a40;
        padding: 1rem 2rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }


    .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
        color: #343a40;
        text-transform: uppercase;
    }


    .navbar-nav .nav-link {
        font-size: 1rem;
        color: #495057;
        padding: 0.5rem 1rem;
        transition: color 0.3s ease-in-out;
        border-radius: 0.25rem;
    }


    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #007bff;
        background-color: transparent;
        text-decoration: underline;
        text-decoration-color: #007bff;
        text-decoration-thickness: 3px;
    }

    /* Navbar for mobile view */
    @media (max-width: 991px) {
        .navbar {
            padding: 0.75rem 1.5rem;
        }

        .navbar-brand {
            font-size: 1.25rem;
        }

        .navbar-nav .nav-link {
            padding: 0.5rem 0;
        }
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
        .navbar-brand {
            font-size: 1rem;
        }

        .navbar-nav .nav-link {
            font-size: 0.9rem;
            padding: 0.4rem 0;
        }
    }
</style>

<!-- Top nav bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white mb-4" style="border: 1px solid black;">
    <div class="container-fluid">
        <div class="navbar-brand" style="color: black;">Beneficiary</div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="{{ route('superadmin.beneficiaries.list') }}" class="nav-link" style="color: black;">List
                        of Beneficiaries</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('superadmin.beneficiaries.create') }}" class="nav-link" style="color: black;">Add
                        Beneficiary</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //Permanent Address
    $(document).ready(function() {
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
                            '<option value="">Select City/Municipality</option>');
                        $('#permanent_address_barangay').empty().append(
                            '<option value="">Select Barangay</option>');
                        $.each(data, function(key, value) {
                            $('#permanent_address_province').append(
                                '<option value="' + value.psgc + '">' + value
                                .col_province + '</option>');
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

        $('#permanent_address_province').change(function() {
            var provincePsgc = $(this).val();
            if (provincePsgc) {
                $.ajax({
                    url: '/address/cities/' + provincePsgc,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#permanent_address_city').empty().append(
                            '<option value="">Select City/Municipality</option>');
                        $('#permanent_address_barangay').empty().append(
                            '<option value="">Select Barangay</option>');
                        $.each(data, function(key, value) {
                            $('#permanent_address_city').append('<option value="' +
                                value.psgc + '">' + value.col_citymuni +
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
                                '<option value="' + value.psgc + '">' + value
                                .col_brgy + '</option>');
                        });
                    }
                });
            } else {
                $('#permanent_address_barangay').empty().append(
                    '<option value="">Select Barangay</option>');
            }
        });
    });

    //Present Address
    $(document).ready(function() {
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
                            '<option value="">Select City/Municipality</option>');
                        $('#present_address_barangay').empty().append(
                            '<option value="">Select Barangay</option>');
                        $.each(data, function(key, value) {
                            $('#present_address_province').append(
                                '<option value="' + value.psgc + '">' + value
                                .col_province + '</option>');
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

        $('#present_address_province').change(function() {
            var provincePsgc = $(this).val();
            if (provincePsgc) {
                $.ajax({
                    url: '/address/cities/' + provincePsgc,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#present_address_city').empty().append(
                            '<option value="">Select City/Municipality</option>');
                        $('#present_address_barangay').empty().append(
                            '<option value="">Select Barangay</option>');
                        $.each(data, function(key, value) {
                            $('#present_address_city').append('<option value="' +
                                value.psgc + '">' + value.col_citymuni +
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
                                '<option value="' + value.psgc + '">' + value
                                .col_brgy + '</option>');
                        });
                    }
                });
            } else {
                $('#present_address_barangay').empty().append(
                    '<option value="">Select Barangay</option>');
            }
        });
    });

    // Spouse Address
    $(document).ready(function() {
        $('#spouse_address_region').change(function() {
            var regionPsgc = $(this).val();
            if (regionPsgc) {
                $.ajax({
                    url: '/address/provinces/' + regionPsgc,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#spouse_address_province').empty().append(
                            '<option value="">Select Province</option>');
                        $('#spouse_address_city').empty().append(
                            '<option value="">Select City/Municipality</option>');
                        $('#spouse_address_barangay').empty().append(
                            '<option value="">Select Barangay</option>');
                        $.each(data, function(key, value) {
                            $('#spouse_address_province').append(
                                '<option value="' + value.psgc + '">' + value
                                .col_province + '</option>');
                        });
                    }
                });
            } else {
                $('#spouse_address_province').empty().append(
                    '<option value="">Select Province</option>');
                $('#spouse_address_city').empty().append(
                    '<option value="">Select City/Municipality</option>');
                $('#spouse_address_barangay').empty().append(
                    '<option value="">Select Barangay</option>');
            }
        });

        $('#spouse_address_province').change(function() {
            var provincePsgc = $(this).val();
            if (provincePsgc) {
                $.ajax({
                    url: '/address/cities/' + provincePsgc,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#spouse_address_city').empty().append(
                            '<option value="">Select City/Municipality</option>');
                        $('#spouse_address_barangay').empty().append(
                            '<option value="">Select Barangay</option>');
                        $.each(data, function(key, value) {
                            $('#spouse_address_city').append(
                                '<option value="' + value.psgc + '">' + value
                                .col_citymuni + '</option>');
                        });
                    }
                });
            } else {
                $('#spouse_address_city').empty().append(
                    '<option value="">Select City/Municipality</option>');
                $('#spouse_address_barangay').empty().append(
                    '<option value="">Select Barangay</option>');
            }
        });

        $('#spouse_address_city').change(function() {
            var cityMuniPsgc = $(this).val();
            if (cityMuniPsgc) {
                $.ajax({
                    url: '/address/barangays/' + cityMuniPsgc,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#spouse_address_barangay').empty().append(
                            '<option value="">Select Barangay</option>');
                        $.each(data, function(key, value) {
                            $('#spouse_address_barangay').append(
                                '<option value="' + value.psgc + '">' + value
                                .col_brgy + '</option>');
                        });
                    }
                });
            } else {
                $('#spouse_address_barangay').empty().append(
                    '<option value="">Select Barangay</option>');
            }
        });
    });
</script>

<!-- Page Content -->
<div class="container">

    <div class="card">
        <div class="card-body">
            <h2 class="text-center mt-5">SOCIAL PENSION VALIDATION FORM</h2>
            <h4 class="text-center">SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS</h4>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form action="{{ route('beneficiaries.update', ['id' => $beneficiary->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="osca_id">OSCA ID No.</label>
                    <input type="text" class="form-control" name="osca_id" id="osca_id"
                        value="{{ $beneficiary->osca_id }}" required>

                    <label for="ncsc_rrn">NCSC RRN (If Applicable)</label>
                    <input type="text" class="form-control" name="ncsc_rrn" id="ncsc_rrn"
                        value="{{ $beneficiary->ncsc_rrn }}">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="profile_upload">Upload Profile Picture:</label>
                            <input type="file" class="form-control-file" name="profile_upload" id="profile_upload">
                        </div>
                    </div>
                </div>
                <br><br>

                <h4 class="mt-4">I. IDENTIFYING INFORMATION (Pagkilala ng Impormasyon)</h4>
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name"
                            value="{{ $beneficiary->BeneficiaryInfo->last_name }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name"
                            value="{{ $beneficiary->BeneficiaryInfo->first_name }}" required>
                    </div>
                    <div class="col-md-3">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" id="middle_name"
                            value="{{ $beneficiary->BeneficiaryInfo->middle_name }}">
                    </div>
                    <div class="col-md-3">
                        <label for="name_extension">Name Extension</label>
                        <select id="name_extension" name="name_extension" class="form-control" required>
                            <option value="">Choose...</option>
                            <option value="Jr."
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'Jr.' ? 'selected' : '' }}>Jr.
                            </option>
                            <option value="Sr."
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'Sr.' ? 'selected' : '' }}>Sr.
                            </option>
                            <option value="II"
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'II' ? 'selected' : '' }}>II
                            </option>
                            <option value="III"
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'III' ? 'selected' : '' }}>III
                            </option>
                            <option value="IV"
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'IV' ? 'selected' : '' }}>IV
                            </option>
                            <option value="V"
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'V' ? 'selected' : '' }}>V</option>
                            <option value="VI"
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'VI' ? 'selected' : '' }}>VI
                            </option>
                            <option value="VII"
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'VII' ? 'selected' : '' }}>VII
                            </option>
                            <option value="VIII"
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'VIII' ? 'selected' : '' }}>VIII
                            </option>
                            <option value="IX"
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'IX' ? 'selected' : '' }}>IX
                            </option>
                            <option value="X"
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'X' ? 'selected' : '' }}>X</option>
                            <option value="N/A"
                                {{ $beneficiary->BeneficiaryInfo->name_extension == 'N/A' ? 'selected' : '' }}>N/A
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>MOTHER’S MAIDEN NAME</label>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="mother_last_name">Last Name</label>
                            <input type="text" class="form-control" name="mother_last_name" id="mother_last_name"
                                value="{{ old('mother_last_name', $beneficiary->MothersMaidenName->mother_last_name) }}"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label for="mother_first_name">First Name</label>
                            <input type="text" class="form-control" name="mother_first_name"
                                id="mother_first_name"
                                value="{{ old('mother_first_name', $beneficiary->MothersMaidenName->mother_first_name) }}"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label for="mother_middle_name">Middle Name</label>
                            <input type="text" class="form-control" name="mother_middle_name"
                                id="mother_middle_name"
                                value="{{ old('mother_middle_name', $beneficiary->MothersMaidenName->mother_middle_name) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>PERMANENT ADDRESS</label>
                    <div class="form-row">
                        <div class="col-md-2">
                            @php
                                $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                                $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                                $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                                $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                                $permanentAddress = $beneficiary->addresses->where('type', 'permanent')->first();
                            @endphp

                            <select class="form-control" id="permanent_address_region"
                                name="permanent_address_region" required>
                                <option value="">Select Region</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->psgc }}"
                                        {{ $permanentAddress && $permanentAddress->region == $region->col_region ? 'selected' : '' }}>
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
                                        {{ $permanentAddress && $permanentAddress->province == $province->col_province ? 'selected' : '' }}>
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
                                        {{ $permanentAddress && $permanentAddress->city == $city->col_citymuni ? 'selected' : '' }}>
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
                                        {{ $permanentAddress && $permanentAddress->barangay == $barangay->col_brgy ? 'selected' : '' }}>
                                        {{ $barangay->col_brgy }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="permanent_address_sitio"
                                placeholder="Sitio/House No./Purok/Street"
                                value="{{ old('permanent_address_sitio', $permanentAddress->sitio ?? '') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>PRESENT ADDRESS</label>
                    <div class="form-row">
                        <div class="col-md-2">
                            @php
                                $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                                $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                                $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                                $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                                $presentAddress = $beneficiary->addresses->where('type', 'present')->first();
                            @endphp

                            <select class="form-control" id="present_address_region" name="present_address_region"
                                required>
                                <option value="">Select Region</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->psgc }}"
                                        {{ $presentAddress && $presentAddress->region == $region->col_region ? 'selected' : '' }}>
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
                                        {{ $presentAddress && $presentAddress->province == $province->col_province ? 'selected' : '' }}>
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
                                        {{ $presentAddress && $presentAddress->city == $city->col_citymuni ? 'selected' : '' }}>
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
                                        {{ $presentAddress && $presentAddress->barangay == $barangay->col_brgy ? 'selected' : '' }}>
                                        {{ $barangay->col_brgy }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="present_address_sitio"
                                placeholder="Sitio/House No./Purok/Street"
                                value="{{ old('present_address_sitio', $presentAddress->sitio ?? '') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col-md-3">
                        <label for="date_of_birth">DATE OF BIRTH</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                            max="{{ date('Y-m-d', strtotime('-60 years')) }}"
                            value="{{ old('date_of_birth', $beneficiary->MothersMaidenName->date_of_birth ?? '') }}"
                            required>
                    </div>
                    <div class="col-md-3">
                        <label for="place_of_birth">PLACE OF BIRTH</label>
                        <label for="place_of_birth_city">City/Municipality</label>
                        <input type="text" class="form-control" name="place_of_birth_city"
                            id="place_of_birth_city"
                            value="{{ old('place_of_birth_city', $beneficiary->MothersMaidenName->place_of_birth_city ?? '') }}"
                            required>
                    </div>
                    <div class="col-md-3">
                        <label for="place_of_birth_city">Province</label>
                        <input type="text" class="form-control" name="place_of_birth_province"
                            id="place_of_birth_province"
                            value="{{ old('place_of_birth_province', $beneficiary->MothersMaidenName->place_of_birth_province ?? '') }}"
                            required>
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col-md-3">
                        <label for="age">AGE</label>
                        <input type="number" class="form-control" name="age" id="age"
                            value="{{ old('age', $beneficiary->MothersMaidenName->age ?? '') }}" required readonly>
                    </div>

                    <div class="col-md-3">
                        <label for="sex">SEX</label>
                        <select name="sex" id="sex" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male"
                                {{ old('sex', $beneficiary->MothersMaidenName->sex ?? '') == 'Male' ? 'selected' : '' }}>
                                Male</option>
                            <option value="Female"
                                {{ old('sex', $beneficiary->MothersMaidenName->sex ?? '') == 'Female' ? 'selected' : '' }}>
                                Female</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="civil_status">CIVIL STATUS:</label>
                        <select name="civil_status" id="civil_status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="Single"
                                {{ old('civil_status', $beneficiary->MothersMaidenName->civil_status ?? '') == 'Single' ? 'selected' : '' }}>
                                Single</option>
                            <option value="Married"
                                {{ old('civil_status', $beneficiary->MothersMaidenName->civil_status ?? '') == 'Married' ? 'selected' : '' }}>
                                Married</option>
                            <option value="Widowed"
                                {{ old('civil_status', $beneficiary->MothersMaidenName->civil_status ?? '') == 'Widowed' ? 'selected' : '' }}>
                                Widowed</option>
                            <option value="Separated"
                                {{ old('civil_status', $beneficiary->MothersMaidenName->civil_status ?? '') == 'Separated' ? 'selected' : '' }}>
                                Separated</option>
                        </select>
                    </div>
                </div>

                <label for="affiliation">AFFILIATION</label>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="affiliation[]" id="listahanan"
                            value="Listahanan"
                            {{ in_array('Listahanan', explode(',', $beneficiary->affiliation->affiliation_type ?? '')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="listahanan">Listahanan</label>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="affiliation[]" id="pantawid"
                            value="Pantawid Beneficiary"
                            {{ in_array('Pantawid Beneficiary', explode(',', $beneficiary->affiliation->affiliation_type ?? '')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="pantawid">Pantawid Beneficiary (Benepisyaryo ng
                            4Ps)</label>
                    </div>
                    <div class="form-group mt-2" id="hh_id_group"
                        style="display: {{ in_array('Pantawid Beneficiary', explode(',', $beneficiary->affiliation->affiliation_type ?? '')) ? 'block' : 'none' }};">
                        <label for="hh_id">Specify HH ID (Itala):</label>
                        <input type="text" class="form-control" name="hh_id" id="hh_id"
                            value="{{ $beneficiary->affiliation->hh_id ?? '' }}">
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="affiliation[]" id="indigenous"
                            value="Indigenous People"
                            {{ in_array('Indigenous People', explode(',', $beneficiary->affiliation->affiliation_type ?? '')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="indigenous">Indigenous People (Mga Katutubo)</label>
                    </div>
                    <div class="form-group mt-2" id="indigenous_specify_group"
                        style="display: {{ in_array('Indigenous People', explode(',', $beneficiary->affiliation->affiliation_type ?? '')) ? 'block' : 'none' }};">
                        <label for="indigenous_specify">Specify (Itala):</label>
                        <input type="text" class="form-control" name="indigenous_specify" id="indigenous_specify"
                            value="{{ $beneficiary->affiliation->indigenous_specify ?? '' }}">
                    </div>
                </div>
                <br><br>

                <h4 class="mt-4">II. FAMILY INFORMATION (Impormasyon ng Pamilya)</h4>
                <div class="form-group">
                    <label for="spouse_name">NAME OF SPOUSE</label>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="spouse_last_name">Last Name</label>
                            <input type="text" class="form-control" name="spouse_last_name" id="spouse_last_name"
                                value="{{ old('spouse_last_name', $beneficiary->spouse->spouse_last_name ?? '') }}"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label for="spouse_first_name">First Name</label>
                            <input type="text" class="form-control" name="spouse_first_name"
                                id="spouse_first_name"
                                value="{{ old('spouse_first_name', $beneficiary->spouse->spouse_first_name ?? '') }}"
                                required>
                        </div>
                        <div class="col-md-3">
                            <label for="spouse_middle_name">Middle Name</label>
                            <input type="text" class="form-control" name="spouse_middle_name"
                                id="spouse_middle_name"
                                value="{{ old('spouse_middle_name', $beneficiary->spouse->spouse_middle_name ?? '') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="spouse_name_extension">Name Extension</label>
                            <select id="spouse_name_extension" name="spouse_name_extension" class="form-control"
                                required>
                                <option value="">Choose...</option>
                                <option value="Jr."
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'Jr.' ? 'selected' : '' }}>
                                    Jr.</option>
                                <option value="Sr."
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'Sr.' ? 'selected' : '' }}>
                                    Sr.</option>
                                <option value="II"
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'II' ? 'selected' : '' }}>
                                    II</option>
                                <option value="III"
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'III' ? 'selected' : '' }}>
                                    III</option>
                                <option value="IV"
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'IV' ? 'selected' : '' }}>
                                    IV</option>
                                <option value="V"
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'V' ? 'selected' : '' }}>
                                    V</option>
                                <option value="VI"
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'VI' ? 'selected' : '' }}>
                                    VI</option>
                                <option value="VII"
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'VII' ? 'selected' : '' }}>
                                    VII</option>
                                <option value="VIII"
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'VIII' ? 'selected' : '' }}>
                                    VIII</option>
                                <option value="IX"
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'IX' ? 'selected' : '' }}>
                                    IX</option>
                                <option value="X"
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'X' ? 'selected' : '' }}>
                                    X</option>
                                <option value="N/A"
                                    {{ old('spouse_name_extension', $beneficiary->spouse->spouse_name_extension ?? '') == 'N/A' ? 'selected' : '' }}>
                                    N/A</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>SPOUSE ADDRESS</label>
                    <div class="form-row">
                        <div class="col-md-2">
                            @php
                                $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                                $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                                $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                                $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                                $spouseAddress = $beneficiary->addresses->where('type', 'spouse_address')->first();
                            @endphp

                            <select class="form-control" id="spouse_address_region" name="spouse_address_region"
                                required>
                                <option value="">Select Region</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->psgc }}"
                                        {{ $spouseAddress && $spouseAddress->region == $region->col_region ? 'selected' : '' }}>
                                        {{ $region->col_region }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="spouse_address_province" name="spouse_address_province"
                                required>
                                <option value="">Select Province</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->psgc }}"
                                        {{ $spouseAddress && $spouseAddress->province == $province->col_province ? 'selected' : '' }}>
                                        {{ $province->col_province }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="spouse_address_city" name="spouse_address_city"
                                required>
                                <option value="">Select City/Municipality</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->psgc }}"
                                        {{ $spouseAddress && $spouseAddress->city == $city->col_citymuni ? 'selected' : '' }}>
                                        {{ $city->col_citymuni }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="spouse_address_barangay" name="spouse_address_barangay"
                                required>
                                <option value="">Select Barangay</option>
                                @foreach ($barangays as $barangay)
                                    <option value="{{ $barangay->psgc }}"
                                        {{ $spouseAddress && $spouseAddress->barangay == $barangay->col_brgy ? 'selected' : '' }}>
                                        {{ $barangay->col_brgy }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="spouse_address_sitio"
                                placeholder="Sitio/House No./Purok/Street"
                                value="{{ old('spouse_address_sitio', $spouseAddress->sitio ?? '') }}" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label><strong>13. Spouse Contact Number</strong></label>
                    <div class="form-row custom-form-row">
                        <div class="col-md-3 mb-3">
                            <label for="spouse_contact"></label>
                            <input type="text" class="form-control" id="spouse_contact" name="spouse_contact"
                                   value="{{ old('spouse_contact', $beneficiary->spouse->spouse_contact ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>CHILDREN</label>
                    <table class="table table-bordered" id="children_table">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>CIVIL STATUS</th>
                                <th>OCCUPATION</th>
                                <th>INCOME</th>
                                <th>CONTACT NUMBER</th>
                                <th>
                                    <button type="button" class="btn btn-success" id="add_child">Add Child</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beneficiary->child as $index => $child)
                                <tr>
                                    <td><input type="text" class="form-control"
                                            name="children[{{ $index }}][name]"
                                            value="{{ $child->children_name }}" required></td>
                                    <td>
                                        <select class="form-control"
                                            name="children[{{ $index }}][civil_status]" required>
                                            <option value="">Civil Status</option>
                                            <option value="Single"
                                                {{ $child->children_civil_status == 'Single' ? 'selected' : '' }}>
                                                Single</option>
                                            <option value="Married"
                                                {{ $child->children_civil_status == 'Married' ? 'selected' : '' }}>
                                                Married</option>
                                            <option value="Widowed"
                                                {{ $child->children_civil_status == 'Widowed' ? 'selected' : '' }}>
                                                Widowed</option>
                                            <option value="Separated"
                                                {{ $child->children_civil_status == 'Separated' ? 'selected' : '' }}>
                                                Separated</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control"
                                            name="children[{{ $index }}][occupation]"
                                            value="{{ $child->children_occupation }}" required></td>
                                    <td><input type="text" class="form-control"
                                            name="children[{{ $index }}][income]"
                                            value="{{ $child->children_income }}" required></td>
                                    <td><input type="text" class="form-control"
                                            name="children[{{ $index }}][contact_number]"
                                            value="{{ $child->children_contact_number }}" required></td>
                                    <td><button type="button" class="btn btn-danger remove_child">Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <label>NAME OF AUTHORIZED REPRESENTATIVES</label>
                    <table class="table table-bordered" id="representatives_table">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>CIVIL STATUS</th>
                                <th>CONTACT NUMBER</th>
                                <th>
                                    <button type="button" class="btn btn-success" id="add_representative">Add
                                        Representative</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beneficiary->representative as $index => $representative)
                                <tr>
                                    <td><input type="text" class="form-control"
                                            name="representatives[{{ $index }}][name]"
                                            value="{{ $representative->representative_name }}" required></td>
                                    <td>
                                        <select class="form-control"
                                            name="representatives[{{ $index }}][civil_status]" required>
                                            <option value="">Civil Status</option>
                                            <option value="Single"
                                                {{ $representative->representative_civil_status == 'Single' ? 'selected' : '' }}>
                                                Single</option>
                                            <option value="Married"
                                                {{ $representative->representative_civil_status == 'Married' ? 'selected' : '' }}>
                                                Married</option>
                                            <option value="Widowed"
                                                {{ $representative->representative_civil_status == 'Widowed' ? 'selected' : '' }}>
                                                Widowed</option>
                                            <option value="Separated"
                                                {{ $representative->representative_civil_status == 'Separated' ? 'selected' : '' }}>
                                                Separated</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control"
                                            name="representatives[{{ $index }}][contact_number]"
                                            value="{{ $representative->representative_contact_number }}" required>
                                    </td>
                                    <td><button type="button"
                                            class="btn btn-danger remove_representative">Remove</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <label for="spouse_name">NAME OF CAREGIVER</label>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="caregiver_last_name"
                                id="caregiver_last_name"
                                value="{{ old('caregiver_last_name', $beneficiary->caregiver->caregiver_last_name ?? '') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="caregiver_first_name"
                                id="caregiver_first_name"
                                value="{{ old('caregiver_first_name', $beneficiary->caregiver->caregiver_first_name ?? '') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" class="form-control" name="caregiver_middle_name"
                                id="caregiver_middle_name"
                                value="{{ old('caregiver_middle_name', $beneficiary->caregiver->caregiver_middle_name ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col-md-3">
                        <label for="name_extension">Name Extension</label>
                        <select id="caregiver_name_extension" name="caregiver_name_extension" class="form-control">
                            <option value="">Choose...</option>
                            <option value="Jr."
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'Jr.' ? 'selected' : '' }}>
                                Jr.</option>
                            <option value="Sr."
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'Sr.' ? 'selected' : '' }}>
                                Sr.</option>
                            <option value="II"
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'II' ? 'selected' : '' }}>
                                II</option>
                            <option value="III"
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'III' ? 'selected' : '' }}>
                                III</option>
                            <option value="IV"
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'IV' ? 'selected' : '' }}>
                                IV</option>
                            <option value="V"
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'V' ? 'selected' : '' }}>
                                V</option>
                            <option value="VI"
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'VI' ? 'selected' : '' }}>
                                VI</option>
                            <option value="VII"
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'VII' ? 'selected' : '' }}>
                                VII</option>
                            <option value="VIII"
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'VIII' ? 'selected' : '' }}>
                                VIII</option>
                            <option value="IX"
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'IX' ? 'selected' : '' }}>
                                IX</option>
                            <option value="X"
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'X' ? 'selected' : '' }}>
                                X</option>
                            <option value="N/A"
                                {{ old('caregiver_name_extension', $beneficiary->caregiver->caregiver_name_extension ?? '') == 'N/A' ? 'selected' : '' }}>
                                N/A</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="spouse_contact">RELATIONSHIP (to Beneficiary)</label>
                        <input type="text" class="form-control" name="caregiver_relationship"
                            id="caregiver_relationship"
                            value="{{ old('caregiver_relationship', $beneficiary->caregiver->caregiver_relationship ?? '') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="caregiver_contact">CONTACT NUMBER</label>
                        <input type="text" class="form-control" name="caregiver_contact" id="caregiver_contact"
                            value="{{ old('caregiver_contact', $beneficiary->caregiver->caregiver_contact ?? '') }}">
                    </div>
                </div>


                @php
                    $houseStatus = explode(',', $beneficiary->housingLivingStatus->house_status ?? '');
                    $livingStatus = explode(',', $beneficiary->housingLivingStatus->living_status ?? '');
                @endphp

                <div class="form-group mt-3">
                    <div class="col-md-3">
                        <label for="house_status">HOUSE STATUS</label>
                        <div>
                            <input type="checkbox" name="house_status[]" value="Owned"
                                onclick="toggleCheckbox('house_status', this, false)"
                                {{ in_array('Owned', $houseStatus) ? 'checked' : '' }}> Owned
                            <input type="checkbox" name="house_status[]" value="Rent"
                                onclick="toggleCheckbox('house_status', this, false)"
                                {{ in_array('Rent', $houseStatus) ? 'checked' : '' }}> Rent
                            <input type="checkbox" name="house_status[]" value="Others"
                                onclick="toggleCheckbox('house_status', this, true)"
                                {{ in_array('Others', $houseStatus) ? 'checked' : '' }}> Others
                        </div>
                        <input type="text" class="form-control mt-2" name="house_status_others_input"
                            id="house_status_others_input"
                            style="display: {{ in_array('Others', $houseStatus) ? 'block' : 'none' }};"
                            placeholder="Specify other house status"
                            value="{{ $beneficiary->housingLivingStatus->house_status_others_input ?? '' }}">
                    </div>

                    <div class="col-md-3">
                        <label for="living_status">LIVING STATUS</label>
                        <div>
                            <input type="checkbox" name="living_status[]" value="Living Alone"
                                onclick="toggleCheckbox('living_status', this, false)"
                                {{ in_array('Living Alone', $livingStatus) ? 'checked' : '' }}> Living Alone
                            <input type="checkbox" name="living_status[]" value="Living with spouse"
                                onclick="toggleCheckbox('living_status', this, false)"
                                {{ in_array('Living with spouse', $livingStatus) ? 'checked' : '' }}> Living with
                            spouse
                            <input type="checkbox" name="living_status[]" value="Living with children"
                                onclick="toggleCheckbox('living_status', this, false)"
                                {{ in_array('Living with children', $livingStatus) ? 'checked' : '' }}> Living with
                            children
                            <input type="checkbox" name="living_status[]" value="Others"
                                onclick="toggleCheckbox('living_status', this, true)"
                                {{ in_array('Others', $livingStatus) ? 'checked' : '' }}> Others
                        </div>
                        <input type="text" class="form-control mt-2" name="living_status_others_input"
                            id="living_status_others_input"
                            style="display: {{ in_array('Others', $livingStatus) ? 'block' : 'none' }};"
                            placeholder="Specify other living status"
                            value="{{ $beneficiary->housingLivingStatus->living_status_others_input ?? '' }}">
                    </div>
                </div>
                <br><br>

                <h4 class="mt-4">III. ECONOMIC INFORMATION (Impormasyong Pang-ekonomiya)</h4>
                <div class="form-row">
                    <div class="income-table">
                        <div class="income-header">
                            <div></div>
                            <div>How much</div>
                            <div>Source</div>
                        </div>

                        <!-- Receiving Pension -->
                        <div class="income-row">
                            <div>
                                <label for="pension">Receiving Pension</label>
                                <br />
                                <input type="checkbox" id="receiving_pension_yes" name="receiving_pension"
                                    value="Yes"
                                    onclick="handleCheckboxSelectionEco('receiving_pension', true, 'pension_amount', 'pension_source')"
                                    {{ $beneficiary->economicInformation->receiving_pension == 'Yes' ? 'checked' : '' }} />
                                Yes
                                <input type="checkbox" id="receiving_pension_no" name="receiving_pension"
                                    value="No"
                                    onclick="handleCheckboxSelectionEco('receiving_pension', false, 'pension_amount', 'pension_source')"
                                    {{ $beneficiary->economicInformation->receiving_pension == 'No' ? 'checked' : '' }} />
                                No
                            </div>
                            <div><input type="text" id="pension_amount" name="pension_amount"
                                    placeholder="Enter amount"
                                    value="{{ $beneficiary->economicInformation->pension_amount ?? '' }}"
                                    style="{{ $beneficiary->economicInformation->receiving_pension == 'Yes' ? 'display:block;' : 'display:none;' }}" />
                            </div>
                            <div><input type="text" id="pension_source" name="pension_source"
                                    placeholder="Enter source"
                                    value="{{ $beneficiary->economicInformation->pension_source ?? '' }}"
                                    style="{{ $beneficiary->economicInformation->receiving_pension == 'Yes' ? 'display:block;' : 'display:none;' }}" />
                            </div>
                        </div>

                        <!-- Permanent Income -->
                        <div class="income-row">
                            <div>
                                <label for="permanent_income">Permanent Income</label>
                                <br />
                                <input type="checkbox" id="permanent_income_yes" name="permanent_income"
                                    value="Yes"
                                    onclick="handleCheckboxSelectionEco('permanent_income', true, 'income_amount', 'income_source')"
                                    {{ $beneficiary->economicInformation->permanent_income == 'Yes' ? 'checked' : '' }} />
                                Yes
                                <input type="checkbox" id="permanent_income_no" name="permanent_income"
                                    value="No"
                                    onclick="handleCheckboxSelectionEco('permanent_income', false, 'income_amount', 'income_source')"
                                    {{ $beneficiary->economicInformation->permanent_income == 'No' ? 'checked' : '' }} />
                                No
                            </div>
                            <div><input type="text" id="income_amount" name="income_amount"
                                    placeholder="Enter amount"
                                    value="{{ $beneficiary->economicInformation->income_amount ?? '' }}"
                                    style="{{ $beneficiary->economicInformation->permanent_income == 'Yes' ? 'display:block;' : 'display:none;' }}" />
                            </div>
                            <div><input type="text" id="income_source" name="income_source"
                                    placeholder="Enter source"
                                    value="{{ $beneficiary->economicInformation->income_source ?? '' }}"
                                    style="{{ $beneficiary->economicInformation->permanent_income == 'Yes' ? 'display:block;' : 'display:none;' }}" />
                            </div>
                        </div>

                        <!-- Regular Support -->
                        <div class="income-row">
                            <div>
                                <label for="regular_support">Regular Support</label>
                                <br />
                                <input type="checkbox" id="regular_support_yes" name="regular_support"
                                    value="Yes"
                                    onclick="handleCheckboxSelectionEco('regular_support', true, 'support_amount', 'support_source')"
                                    {{ $beneficiary->economicInformation->regular_support == 'Yes' ? 'checked' : '' }} />
                                Yes
                                <input type="checkbox" id="regular_support_no" name="regular_support" value="No"
                                    onclick="handleCheckboxSelectionEco('regular_support', false, 'support_amount', 'support_source')"
                                    {{ $beneficiary->economicInformation->regular_support == 'No' ? 'checked' : '' }} />
                                No
                            </div>
                            <div><input type="text" id="support_amount" name="support_amount"
                                    placeholder="Enter amount"
                                    value="{{ $beneficiary->economicInformation->support_amount ?? '' }}"
                                    style="{{ $beneficiary->economicInformation->regular_support == 'Yes' ? 'display:block;' : 'display:none;' }}" />
                            </div>
                            <div><input type="text" id="support_source" name="support_source"
                                    placeholder="Enter source"
                                    value="{{ $beneficiary->economicInformation->support_source ?? '' }}"
                                    style="{{ $beneficiary->economicInformation->regular_support == 'Yes' ? 'display:block;' : 'display:none;' }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>

                <h4 class="mt-4">IV. HEALTH INFORMATION (Impormasyon sa Kalusugan)</h4>
                <div class="form-row">
                    <div class="income-table">
                        <div class="income-header">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="income-row">
                            <div>
                                <label>With Existing Illness</label>
                            </div>
                            <div>
                                <input type="checkbox" id="existing_illness_yes" name="existing_illness"
                                    value="Yes" onclick="toggleFields('existing_illness', 'illness_specify')"
                                    {{ $beneficiary->healthInformation->existing_illness == 'Yes' ? 'checked' : '' }} />
                                Yes
                                <input type="checkbox" id="existing_illness_none" name="existing_illness"
                                    value="None" onclick="toggleFields('existing_illness', 'illness_specify')"
                                    {{ $beneficiary->healthInformation->existing_illness == 'None' ? 'checked' : '' }} />
                                None
                            </div>
                            <div><input type="text" id="illness_specify" name="illness_specify"
                                    placeholder="Specify"
                                    style="display:{{ $beneficiary->healthInformation->existing_illness == 'Yes' ? 'block' : 'none' }};"
                                    value="{{ $beneficiary->healthInformation->illness_specify ?? '' }}" /></div>
                        </div>
                        <div class="income-row">
                            <div>
                                <label>With Disability</label>
                            </div>
                            <div>
                                <input type="checkbox" id="with_disability_yes" name="with_disability"
                                    value="Yes" onclick="toggleFields('with_disability', 'disability_specify')"
                                    {{ $beneficiary->healthInformation->with_disability == 'Yes' ? 'checked' : '' }} />
                                Yes
                                <input type="checkbox" id="with_disability_none" name="with_disability"
                                    value="None" onclick="toggleFields('with_disability', 'disability_specify')"
                                    {{ $beneficiary->healthInformation->with_disability == 'None' ? 'checked' : '' }} />
                                None
                            </div>
                            <div><input type="text" id="disability_specify" name="disability_specify"
                                    placeholder="Specify"
                                    style="display:{{ $beneficiary->healthInformation->with_disability == 'Yes' ? 'block' : 'none' }};"
                                    value="{{ $beneficiary->healthInformation->disability_specify ?? '' }}" /></div>
                        </div>
                    </div>
                </div>

                <h6 class="mt-4">Frailty Questions</h6>
                <div class="form-row">
                    <div class="income-table">
                        <div class="income-header">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>

                        <!-- Question 1 -->
                        <div class="income-row">
                            <div>
                                <label>1. Do you experience difficulty in doing your ADLs?</label>
                            </div>
                            <div>
                                <input type="checkbox" id="difficult_adl_yes" name="difficult_adl" value="Yes"
                                    onclick="handleCheckboxSelectionFra('difficult_adl', true)"
                                    {{ $beneficiary->healthInformation->difficult_adl == 'Yes' ? 'checked' : '' }} />
                                Yes
                                <input type="checkbox" id="difficult_adl_no" name="difficult_adl" value="No"
                                    onclick="handleCheckboxSelectionFra('difficult_adl', false)"
                                    {{ $beneficiary->healthInformation->difficult_adl == 'No' ? 'checked' : '' }} />
                                No
                            </div>
                            <div></div>
                        </div>

                        <!-- Question 2 -->
                        <div class="income-row">
                            <div>
                                <label>2. Are you completely dependent on someone in doing your IADLs?</label>
                            </div>
                            <div>
                                <input type="checkbox" id="dependent_iadl_yes" name="dependent_iadl" value="Yes"
                                    onclick="handleCheckboxSelectionFra('dependent_iadl', true)"
                                    {{ $beneficiary->healthInformation->dependent_iadl == 'Yes' ? 'checked' : '' }} />
                                Yes
                                <input type="checkbox" id="dependent_iadl_no" name="dependent_iadl" value="No"
                                    onclick="handleCheckboxSelectionFra('dependent_iadl', false)"
                                    {{ $beneficiary->healthInformation->dependent_iadl == 'No' ? 'checked' : '' }} />
                                No
                            </div>
                            <div></div>
                        </div>

                        <!-- Question 3 -->
                        <div class="income-row">
                            <div>
                                <label>3. Are you experiencing weight loss, weakness, exhaustion?</label>
                            </div>
                            <div>
                                <input type="checkbox" id="experience_loss_yes" name="experience_loss"
                                    value="Yes" onclick="handleCheckboxSelectionFra('experience_loss', true)"
                                    {{ $beneficiary->healthInformation->experience_loss == 'Yes' ? 'checked' : '' }} />
                                Yes
                                <input type="checkbox" id="experience_loss_no" name="experience_loss" value="No"
                                    onclick="handleCheckboxSelectionFra('experience_loss', false)"
                                    {{ $beneficiary->healthInformation->experience_loss == 'No' ? 'checked' : '' }} />
                                No
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <h4 class="mt-4">V. ASSESSMENT (Pagtatasa)</h4>
                <div class="form-row">
                    <div class="remarks" id="remarks">
                        <textarea rows="4" id="remarks" name="remarks" class="remarks" cols="100">{{ $beneficiary->assessmentRecommendation->remarks ?? '' }}</textarea>
                    </div>
                </div>
                <br><br>

                <h4 class="mt-4">VI. RECOMMENDATION (Rekomendasyon)</h4>

                <div class="form-group mt-3">
                    <label>Eligibility</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="eligibility_eligible" value="Eligible"
                            onclick="handleCheckboxSelection('eligibility', true)"
                            {{ $beneficiary->assessmentRecommendation->eligibility == 'Eligible' ? 'checked' : '' }} />
                        <label class="form-check-label" for="eligibility_eligible">Eligible</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="eligibility_not_eligible"
                            value="Not Eligible" onclick="handleCheckboxSelection('eligibility', false)"
                            {{ $beneficiary->assessmentRecommendation->eligibility == 'Not Eligible' ? 'checked' : '' }} />
                        <label class="form-check-label" for="eligibility_not_eligible">Not Eligible</label>
                    </div>
                </div>

                <input type="hidden" name="eligibility" id="eligibility_hidden"
                    value="{{ $beneficiary->assessmentRecommendation->eligibility }}">

                <div class="form-group text-center mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    //House Status
    function toggleCheckbox(groupName, checkbox, showInput) {
        const checkboxes = document.querySelectorAll(`input[name="${groupName}[]"]`);
        checkboxes.forEach(cb => {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });
        toggleInput(groupName, showInput);
    }

    function toggleInput(groupName, showInput) {
        const input = document.getElementById(`${groupName}_others_input`);
        if (input) {
            input.style.display = showInput ? 'block' : 'none';
        }
    }

    //Affiliation
    document.addEventListener('DOMContentLoaded', function() {
        const affiliationTypes = "{{ $beneficiary->affiliation->affiliation_type ?? '' }}".split(',');

        const listahananCheckbox = document.getElementById('listahanan');
        const pantawidCheckbox = document.getElementById('pantawid');
        const hhIdGroup = document.getElementById('hh_id_group');
        const hhIdField = document.getElementById('hh_id');
        const indigenousCheckbox = document.getElementById('indigenous');
        const indigenousSpecifyGroup = document.getElementById('indigenous_specify_group');
        const indigenousSpecifyField = document.getElementById('indigenous_specify');

        // Set initial state of checkboxes
        listahananCheckbox.checked = affiliationTypes.includes('Listahanan');
        pantawidCheckbox.checked = affiliationTypes.includes('Pantawid Beneficiary');
        indigenousCheckbox.checked = affiliationTypes.includes('Indigenous People');

        // Set initial visibility of additional fields
        hhIdGroup.style.display = pantawidCheckbox.checked ? 'block' : 'none';
        indigenousSpecifyGroup.style.display = indigenousCheckbox.checked ? 'block' : 'none';

        // Add event listeners to handle visibility on change
        pantawidCheckbox.addEventListener('change', function() {
            if (this.checked) {
                hhIdGroup.style.display = 'block';
            } else {
                hhIdGroup.style.display = 'none';
                hhIdField.value = ''; // Clear the field when unchecked
            }
        });

        indigenousCheckbox.addEventListener('change', function() {
            if (this.checked) {
                indigenousSpecifyGroup.style.display = 'block';
            } else {
                indigenousSpecifyGroup.style.display = 'none';
                indigenousSpecifyField.value = ''; // Clear the field when unchecked
            }
        });

        // Add event listener to clear other fields when "Listahanan" is checked
        listahananCheckbox.addEventListener('change', function() {
            if (this.checked) {
                pantawidCheckbox.checked = false;
                hhIdField.value = '';
                hhIdGroup.style.display = 'none';

                indigenousCheckbox.checked = false;
                indigenousSpecifyField.value = '';
                indigenousSpecifyGroup.style.display = 'none';
            }
        });
    });

    //Economic Information
    function handleCheckboxSelectionEco(field, isYes, amountFieldId, sourceFieldId) {
        const yesCheckbox = document.getElementById(`${field}_yes`);
        const noCheckbox = document.getElementById(`${field}_no`);
        const amountField = document.getElementById(amountFieldId);
        const sourceField = document.getElementById(sourceFieldId);

        // Uncheck the other checkbox if one is checked
        if (isYes) {
            noCheckbox.checked = false;
        } else {
            yesCheckbox.checked = false;
        }

        // Show or hide fields based on the Yes/No selection
        if (yesCheckbox.checked) {
            amountField.style.display = "block";
            sourceField.style.display = "block";
        } else {
            amountField.style.display = "none";
            sourceField.style.display = "none";
        }
    }

    //Health Information
    function toggleFields(groupName, specifyFieldId) {
        const yesCheckbox = document.getElementById(`${groupName}_yes`);
        const noCheckbox = document.getElementById(`${groupName}_none`);
        const specifyField = document.getElementById(specifyFieldId);

        yesCheckbox.addEventListener('change', () => {
            if (yesCheckbox.checked) {
                specifyField.style.display = 'block';
                noCheckbox.checked = false;
            } else {
                specifyField.style.display = 'none';
            }
        });

        noCheckbox.addEventListener('change', () => {
            if (noCheckbox.checked) {
                specifyField.style.display = 'none';
                specifyField.value = ''; // Clear the input field
                yesCheckbox.checked = false;
            }
        });
    }

    //Frailty Questions
    function handleCheckboxSelectionFra(field, isYes) {
        const yesCheckbox = document.getElementById(`${field}_yes`);
        const noCheckbox = document.getElementById(`${field}_no`);

        // Uncheck the other checkbox if one is checked
        if (isYes) {
            noCheckbox.checked = false;
        } else {
            yesCheckbox.checked = false;
        }
    }

    //Eligibility
    function handleCheckboxSelection(field, isYes) {
        const yesCheckbox = document.getElementById(`${field}_eligible`);
        const noCheckbox = document.getElementById(`${field}_not_eligible`);

        // Uncheck the other checkbox if one is checked
        if (isYes) {
            noCheckbox.checked = false;
        } else {
            yesCheckbox.checked = false;
        }

        // Update hidden input value
        document.getElementById(`${field}_hidden`).value = isYes ? 'Eligible' : 'Not Eligible';
    }

    //Age
    document.getElementById('date_of_birth').addEventListener('change', function() {
        const dob = new Date(this.value);
        const today = new Date();
        let age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        document.getElementById('age').value = age;
    });

    //Children
    let childIndex = {{ count($beneficiary->child) }};

    document.getElementById('add_child').addEventListener('click', function() {
        const table = document.getElementById('children_table').getElementsByTagName('tbody')[0];
        const newRow = table.insertRow();

        newRow.innerHTML = `
        <td><input type="text" class="form-control" name="children[${childIndex}][name]" required></td>
        <td>
            <select class="form-control" name="children[${childIndex}][civil_status]" required>
                <option value="">Civil Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Separated">Separated</option>
            </select>
        </td>
        <td><input type="text" class="form-control" name="children[${childIndex}][occupation]" required></td>
        <td><input type="text" class="form-control" name="children[${childIndex}][income]" required></td>
        <td><input type="text" class="form-control" name="children[${childIndex}][contact_number]" required></td>
        <td><button type="button" class="btn btn-danger remove_child">Remove</button></td>
    `;

        childIndex++;
    });

    document.getElementById('children_table').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove_child')) {
            const row = e.target.closest('tr');
            row.remove();
        }
    });

    //Representatives
    let representativeIndex = {{ count($beneficiary->representative) }};

    document.getElementById('add_representative').addEventListener('click', function() {
        const table = document.getElementById('representatives_table').getElementsByTagName('tbody')[0];
        const newRow = table.insertRow();

        newRow.innerHTML = `
        <td><input type="text" class="form-control" name="representatives[${representativeIndex}][name]" required></td>
        <td>
            <select class="form-control" name="representatives[${representativeIndex}][civil_status]" required>
                <option value="">Civil Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Separated">Separated</option>
            </select>
        </td>
        <td><input type="text" class="form-control" name="representatives[${representativeIndex}][contact_number]" required></td>
        <td><button type="button" class="btn btn-danger remove_representative">Remove</button></td>
    `;

        representativeIndex++;
    });

    document.getElementById('representatives_table').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove_representative')) {
            const row = e.target.closest('tr');
            row.remove();
        }
    });
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
