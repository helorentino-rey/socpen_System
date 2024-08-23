@ -0,0 +1,1086 @@
@section('content')
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
                        <a href="{{ route('superadmin.beneficiaries.approve') }}" class="nav-link"
                            style="color: black;">Approve Beneficiaries</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('superadmin.beneficiaries.create') }}" class="nav-link" style="color: black;">Add
                            Beneficiary</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('superadmin.beneficiaries.list') }}" class="nav-link" style="color: black;">List
                            of Beneficiaries</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('superadmin.beneficiaries.export') }}" class="nav-link"
                            style="color: black;">Export List of Beneficiaries</a>
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
                        $('#present_address_province').empty().append('<option value="">Select Province</option>');
                        $('#present_address_city').empty().append('<option value="">Select City/Municipality</option>');
                        $('#present_address_barangay').empty().append('<option value="">Select Barangay</option>');
                        $.each(data, function(key, value) {
                            $('#present_address_province').append('<option value="' + value.psgc + '">' + value.col_province + '</option>');
                        });
                    }
                });
            } else {
                $('#present_address_province').empty().append('<option value="">Select Province</option>');
                $('#present_address_city').empty().append('<option value="">Select City/Municipality</option>');
                $('#present_address_barangay').empty().append('<option value="">Select Barangay</option>');
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
                        $('#present_address_city').empty().append('<option value="">Select City/Municipality</option>');
                        $('#present_address_barangay').empty().append('<option value="">Select Barangay</option>');
                        $.each(data, function(key, value) {
                            $('#present_address_city').append('<option value="' + value.psgc + '">' + value.col_citymuni + '</option>');
                        });
                    }
                });
            } else {
                $('#present_address_city').empty().append('<option value="">Select City/Municipality</option>');
                $('#present_address_barangay').empty().append('<option value="">Select Barangay</option>');
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
                        $('#present_address_barangay').empty().append('<option value="">Select Barangay</option>');
                        $.each(data, function(key, value) {
                            $('#present_address_barangay').append('<option value="' + value.psgc + '">' + value.col_brgy + '</option>');
                        });
                    }
                });
            } else {
                $('#present_address_barangay').empty().append('<option value="">Select Barangay</option>');
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

                <form action="{{ route('add.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="osca_id">OSCA ID No.</label>
                        <input type="text" class="form-control" name="osca_id" id="osca_id" required>

                        <label for="ncsc_rrn">NCSC RRN (If Applicable)</label>
                        <input type="text" class="form-control" name="ncsc_rrn" id="ncsc_rrn">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profile_upload">Upload Profile Picture:</label>
                                <input type="file" class="form-control-file" name="profile_upload" id="profile_upload"
                                    required>
                            </div>
                        </div>
                    </div>
                    <br><br>

                    <h4 class="mt-4">I. IDENTIFYING INFORMATION (Pagkilala ng Impormasyon)</h4>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" required>
                        </div>
                        <div class="col-md-3">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" required>
                        </div>
                        <div class="col-md-3">
                            <label for="middle_name">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" id="middle_name">
                        </div>
                        <div class="col-md-3">
                            <label for="name_extension">Name Extension</label>
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

                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                    <div class="form-group mt-3">
                        <label for="mother_maiden_name">MOTHER’S MAIDEN NAME</label>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="mother_last_name">Last Name</label>
                                <input type="text" class="form-control" name="mother_last_name" id="mother_last_name"
                                    required>
                            </div>
                            <div class="col-md-3">
                                <label for="mother_first_name">First Name</label>
                                <input type="text" class="form-control" name="mother_first_name"
                                    id="mother_first_name" required>
                            </div>
                            <div class="col-md-3">
                                <label for="mother_middle_name">Middle Name</label>
                                <input type="text" class="form-control" name="mother_middle_name"
                                    id="mother_middle_name">
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
                            @endphp

                                <select class="form-control" id="permanent_address_region"
                                    name="permanent_address_region" required>
                                    <option value="">Select Region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->psgc }}">{{ $region->col_region }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="permanent_address_province"
                                    name="permanent_address_province" required>
                                    <option value="">Select Province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->psgc }}">{{ $province->col_province }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" id="permanent_address_city" name="permanent_address_city"
                                    required>
                                    <option value="">Select City/Municipality</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->psgc }}">{{ $city->col_citymuni }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="permanent_address_barangay"
                                    name="permanent_address_barangay" required>
                                    <option value="">Select Barangay</option>
                                    @foreach ($barangays as $barangay)
                                        <option value="{{ $barangay->psgc }}">{{ $barangay->col_brgy }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="permanent_address_sitio"
                                    placeholder="Sitio/House No./Purok/Street" required>
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
                            @endphp

                                <select class="form-control" id="present_address_region" name="present_address_region"
                                    required>
                                    <option value="">Select Region</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->psgc }}">{{ $region->col_region }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="present_address_province"
                                    name="present_address_province" required>
                                    <option value="">Select Province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->psgc }}">{{ $province->col_province }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" id="present_address_city" name="present_address_city"
                                    required>
                                    <option value="">Select City/Municipality</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->psgc }}">{{ $city->col_citymuni }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="present_address_barangay"
                                    name="present_address_barangay" required>
                                    <option value="">Select Barangay</option>
                                    @foreach ($barangays as $barangay)
                                        <option value="{{ $barangay->psgc }}">{{ $barangay->col_brgy }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="present_address_sitio"
                                    placeholder="Sitio/House No./Purok/Street" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-3">
                            <label for="date_of_birth">DATE OF BIRTH</label>
                            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                                max="{{ date('Y-m-d', strtotime('-60 years')) }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="place_of_birth_city">PLACE OF BIRTH</label>
                            <select class="form-control" id="place_of_birth_city" name="place_of_birth_city"
                            required>
                            <option value="">Select City/Municipality</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->psgc }}">{{ $city->col_citymuni }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" id="place_of_birth_province"
                                    name="place_of_birth_province" required>
                                    <option value="">Select Province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->psgc }}">{{ $province->col_province }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-3">
                            <label for="age">AGE</label>
                            <input type="number" class="form-control" name="age" id="age" required>
                        </div>

                        <div class="col-md-3">
                            <label for="sex">SEX</label>
                            <select name="sex" id="sex" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="civil_status">CIVIL STATUS:</label>
                            <select name="civil_status" id="civil_status" class="form-control" required>
                                <option value="">Select Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>
                    </div>

                    <label for="affiliation">AFFILIATION</label>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="affiliation[]" id="listahanan"
                                value="Listahanan">
                            <label class="form-check-label" for="listahanan">Listahanan</label>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="affiliation[]" id="pantawid"
                                value="Pantawid Beneficiary">
                            <label class="form-check-label" for="pantawid">Pantawid Beneficiary (Benepisyaryo ng
                                4Ps)</label>
                        </div>
                        <div class="form-group mt-2">
                            <label for="hh_id">Specify HH ID (Itala):</label>
                            <input type="text" class="form-control" name="hh_id" id="hh_id">
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="affiliation[]" id="indigenous"
                                value="Indigenous People">
                            <label class="form-check-label" for="indigenous">Indigenous People (Mga Katutubo)</label>
                        </div>
                        <div class="form-group mt-2">
                            <label for="indigenous_specify">Specify (Itala):</label>
                            <input type="text" class="form-control" name="indigenous_specify"
                                id="indigenous_specify">
                        </div>
                    </div>
                    <br><br>

                    <h4 class="mt-4">II. FAMILY INFORMATION (Impormasyon ng Pamilya)</h4>

                    <div class="form-group">
                        <label for="spouse_name">NAME OF SPOUSE</label>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" required>
                            </div>
                            <div class="col-md-3">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" required>
                            </div>
                            <div class="col-md-3">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control" name="middle_name" id="middle_name">
                            </div>
                            <div class="col-md-3">
                                <label for="name_extension">Name Extension</label>
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

                    <div class="form-group mt-3">
                        <label>ADDRESS</label>
                        <div class="form-row">
                            <div class="col-md-2">
                                <select class="form-control" id="present_address_region" name="present_address_region"
                                    required>
                                    <option value="">Select Region</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="present_address_province"
                                    name="present_address_province" required>
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" id="present_address_city" name="present_address_city"
                                    required>
                                    <option value="">Select City/Municipality</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="present_address_barangay"
                                    name="present_address_barangay" required>
                                    <option value="">Select Barangay</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="present_address_sitio"
                                    placeholder="Sitio/House No./Purok/Street" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="spouse_contact">CONTACT NUMBER</label>
                        <input type="text" class="form-control" name="spouse_contact" id="spouse_contact">
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
                                    <th><button type="button" class="btn btn-success" id="add_child">Add Child</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="children[0][name]" required>
                                    </td>
                                    <td>
                                        <select class="form-control" name="children[0][civil_status]" required>
                                            <option value="">Civil Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="children[0][occupation]"
                                            required></td>
                                    <td><input type="text" class="form-control" name="children[0][income]" required>
                                    </td>
                                    <td><input type="text" class="form-control" name="children[0][contact_number]"
                                            required></td>
                                    <td><button type="button" class="btn btn-danger remove_child">Remove</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <label>NAME OF AUTHORIZED REPRESENTATIVES</label>
                        <table class="table table-bordered" id="children_table">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>CIVIL STATUS</th>
                                    <th>CONTACT NUMBER</th>
                                    <th><button type="button" class="btn btn-success" id="add_child">Add
                                            Representative</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="children[0][name]" required>
                                    </td>
                                    <td>
                                        <select class="form-control" name="children[0][civil_status]" required>
                                            <option value="">Civil Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="children[0][contact_number]"
                                            required></td>
                                    <td><button type="button" class="btn btn-danger remove_child">Remove</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <label for="spouse_name">NAME OF CAREGIVER</label>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" required>
                            </div>
                            <div class="col-md-3">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" required>
                            </div>
                            <div class="col-md-3">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" class="form-control" name="middle_name" id="middle_name">
                            </div>

                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-3">
                            <label for="name_extension">Name Extension</label>
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
                        <div class="col-md-3">
                            <label for="spouse_contact">RELATIONSHIP (to Beneficiary)</label>
                            <input type="text" class="form-control" name="relationship" id="relationship">
                        </div>
                        <div class="col-md-3">
                            <label for="spouse_contact">CONTACT NUMBER</label>
                            <input type="text" class="form-control" name="caregiver_contact" id="caregiver_contact">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="col-md-3">
                            <label for="house_status">HOUSE STATUS</label>
                            <select class="form-control" name="house_status" id="house_status">
                                <option value="Owned">Owned</option>
                                <option value="Rent">Rent</option>
                                <option value="Others">Others</option>
                            </select>
                            <input type="text" class="form-control mt-2" name="house_status_others"
                                id="house_status_others" style="display:none;" placeholder="Specify other house status">
                        </div>

                        <div class="col-md-3">
                            <label for="living_status">LIVING STATUS</label>
                            <select class="form-control" name="living_status" id="living_status">
                                <option value="Living Alone">Living Alone</option>
                                <option value="Living with spouse">Living with spouse</option>
                                <option value="Living with children">Living with children</option>
                                <option value="Others (Iba pa)">Others</option>
                            </select>
                            <input type="text" class="form-control mt-2" name="living_status_others"
                                id="living_status_others" style="display:none;"
                                placeholder="Specify other living status">
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
                            <div class="income-row">
                                <div>
                                    <label for="pension">Receiving Pension</label>
                                    <br />
                                    <input type="radio" id="pension_yes" name="receivingPension" />
                                    <label for="pension_yes">Yes</label>
                                    <input type="radio" id="pension_no" name="receivingPension" />
                                    <label for="pension_no">No</label>
                                </div>
                                <div><input type="text" id="pension_amount" name="receivingPension"
                                        placeholder="Enter amount" />
                                </div>
                                <div><input type="text" id="pension_source" name="receivingPension"
                                        placeholder="Enter source" /></div>
                            </div>
                            <div class="income-row">
                                <div>
                                    <label for="wages">Permanent Income</label>
                                    <br />
                                    <input type="radio" id="income_yes" name="permanentIncome" />
                                    <label for="income_yes">Yes</label>
                                    <input type="radio" id="income_no" name="permanentIncome" />
                                    <label for="income_no">No</label>
                                </div>
                                <div><input type="text" id="income_amount" name="permanentIncome"
                                        placeholder="Enter amount" />
                                </div>
                                <div><input type="text" id="income_source" name="permanentIncome"
                                        placeholder="Enter source" /></div>
                            </div>
                            <div class="income-row">
                                <div>
                                    <label for="wages">Regular Support</label>
                                    <br />
                                    <input type="radio" id="support_yes" name="regularSupport" />
                                    <label for="support_yes">Yes</label>
                                    <input type="radio" id="support_no" name="regularSupport" />
                                    <label for="support_no">No</label>
                                </div>
                                <div><input type="text" id="support_amount" name="regularSupport"
                                        placeholder="Enter amount" />
                                </div>
                                <div><input type="text" id="support_source" name="regularSupport"
                                        placeholder="Enter source" /></div>
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
                                <div><input type="radio" id="illness_yes" name="existingIllness" />
                                    <label for="illness_yes">Yes</label>
                                    <input type="radio" id="illness_no" name="existingIllness" />
                                    <label for="illness_no">No</label>
                                </div>
                                <div><input type="text" id="illness_specify" name="existingIllness"
                                        placeholder="Specify" /></div>
                            </div>
                            <div class="income-row">
                                <div>
                                    <label>With Disability</label>
                                </div>
                                <div><input type="radio" id="disability_yes" name="withDisability" />
                                    <label for="disability_yes">Yes</label>
                                    <input type="radio" id="disability_no" name="withDisability" />
                                    <label for="disability_no">No</label>
                                </div>
                                <div><input type="text" id="disability_specify" name="withDisability"
                                        placeholder="Specify" /></div>
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
                            <div class="income-row">
                                <div>
                                    <label>1. Do you experience difficulty in doing your ADLs?</label>
                                </div>
                                <div><input type="radio" id="difficultadl_yes" name="difficultADL" />
                                    <label for="difficultadl_yes">Yes</label>
                                    <input type="radio" id="difficultadl_no" name="difficultADL" />
                                    <label for="difficultadl_no">No</label>
                                </div>
                                <div></div>
                            </div>
                            <div class="income-row">
                                <div>
                                    <label>2. Are you completely dependent on someone in doing your IADLs?</label>
                                </div>
                                <div><input type="radio" id="dependentiadl_yes" name="dependentIADL" />
                                    <label for="dependentiadl_yes">Yes</label>
                                    <input type="radio" id="dependentiadl_no" name="dependentIADL" />
                                    <label for="dependentiadl_no">No</label>
                                </div>
                                <div></div>
                            </div>
                            <div class="income-row">
                                <div>
                                    <label>3. Are you experiencing weight loss, weakness, exhaustion?</label>
                                </div>
                                <div><input type="radio" id="experienceoss_yes" name="experienceLoss" />
                                    <label for="experienceoss_yes">Yes</label>
                                    <input type="radio" id="experienceoss_no" name="experienceLoss" />
                                    <label for="experienceoss_no">No</label>
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-4">V. ASSESSMENT (Pagtatasa)</h4>
                    <div class="form-row">
                        <div class="remarks">
                            <textarea rows="4" cols="50"></textarea>
                        </div>
                    </div>
                    <br><br>

                    <h4 class="mt-4">VI. RECOMMENDATION (Rekomendasyon)</h4>

                    <div class="form-group mt-3">
                        <label>Eligibility</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="eligibility" id="eligible"
                                value="Eligible">
                            <label class="form-check-label" for="eligible">Eligible </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="eligibility" id="not_eligible"
                                value="Not Eligible">
                            <label class="form-check-label" for="not_eligible">Not Eligible </label>
                        </div>
                    </div>

                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/address.js') }}"></script>
@endsection
