@section('content')
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
        font-family: 'Arial', sans-serif;
    }

    .section-title {
        background-color: #2c6fbb;
        color: #fff;
        padding: 10px;
        border-radius: 3px;
        font-size: 15px;
        font-weight: bold;
        margin-bottom: 20px;
        margin-top: 40px;
        font-family: 'Arial', sans-serif;
    }

    .notice-text {
        color: #d9534f;
        font-size: 14px;
        line-height: 1.5;
        font-family: 'Arial', sans-serif;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        height: 30px;
        font-size: 12px;
        font-family: 'Arial', sans-serif;
    }

    .form-check-label {
        font-size: 13px;
        font-family: 'Arial', sans-serif;
    }

    .check-age-link {
        font-size: 14px;
        color: #28a745;
        text-decoration: none;
        font-family: 'Arial', sans-serif;
    }

    .form-group {
        margin-bottom: 20px;
        font-family: 'Arial', sans-serif;
    }

    .form-row>.col-md-3,
    .form-row>.col-md-2,
    .form-row>.col-md-6 {
        padding-right: 10px;
        padding-left: 10px;
        font-family: 'Arial', sans-serif;
    }

    .form-row>.col-md-1,
    .form-row>.col-md-4,
    .form-row>.col-md-5 {
        padding-right: 5px;
        padding-left: 5px;
        font-family: 'Arial', sans-serif;
    }

    .text-danger {
        color: #d9534f !important;
        font-size: 13px;
        font-family: 'Arial', sans-serif;
    }

    a {
        text-decoration: none;
        cursor: pointer;
        font-family: 'Arial', sans-serif;
    }

    a:hover {
        font-family: 'Arial', sans-serif;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
        font-family: 'Arial', sans-serif;
    }

    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
        font-family: 'Arial', sans-serif;
    }

    .table .btn {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
    }

    .input-group-text {
        background-color: #ffffff;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 14px;
        padding: 5px;
        font-family: 'Arial', sans-serif;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
        font-family: 'Arial', sans-serif;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        margin: 10px;
        font-family: 'Arial', sans-serif;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        font-family: 'Arial', sans-serif;
    }

    .text-center {
        font-size: 25px;
        margin-top: 30px;
        font-weight: bold;
        font-family: 'Arial', sans-serif;
    }

    .soc {
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        font-family: 'Arial', sans-serif;
    }

    .logos {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .dswd-logo,
    .social-pension-logo,
    .bagong-pilipinas-logo {
        margin-right: 10px;
        object-fit: contain;
        vertical-align: middle;
    }

    .dswd-logo {
        height: 60px;
        margin-right: 10px;
        object-fit: contain;
    }

    .social-pension-logo {
        height: 80px;
        margin-right: 10px;
        object-fit: contain;
        margin-top: 5px;
    }

    .bagong-pilipinas-logo {
        height: 80px;
        margin-right: 10px;
        object-fit: contain;
        margin-top: 2px;
    }

    /* New custom section styles */
    .custom-section {
        padding: 20px;
        margin-top: 30px;
        background-color: #f9f9f9;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: 'Arial', sans-serif;
    }

    .custom-form-row {
        display: flex;
        font-family: 'Arial', sans-serif;
    }

    .custom-form-row .form-control {
        height: 35px;
        font-size: 14px;
        border-radius: 5px;
        font-family: 'Arial', sans-serif;
    }

    .custom-section label {
        font-size: 16px;
        font-weight: bold;
        font-family: 'Arial', sans-serif;
    }

    .custom-section .form-control {
        background-color: #ffffff;
        border: 1px solid #ced4da;
        padding: 5px 10px;
        font-family: 'Arial', sans-serif;
    }

    .custom-section .form-row>div {
        padding: 0 10px;
        font-family: 'Arial', sans-serif;
    }

    /* Child Information Section */
    .child-information-section {
        margin-top: 30px;
        font-family: 'Arial', sans-serif;
    }

    .child-information-section label {
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 10px;
        display: block;
        font-family: 'Arial', sans-serif;
    }

    .table {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
        font-family: 'Arial', sans-serif;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        text-align: left;
        font-family: 'Arial', sans-serif;
    }

    .table th {
        font-size: 14px;
        font-weight: bold;
        background-color: #f8f9fa;
        padding: 10px;
        text-align: left;
        border-bottom: 2px solid #dee2e6;
        font-family: 'Arial', sans-serif;
    }

    .table td {
        padding: 8px;
        border-bottom: 1px solid #dee2e6;
        font-family: 'Arial', sans-serif;
    }

    .table input.form-control,
    .table select.form-control {
        height: 30px;
        font-size: 14px;
        border-radius: 5px;
        font-family: 'Arial', sans-serif;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
        font-family: 'Arial', sans-serif;
    }

    .form-control {
        font-size: 14px;
        padding: 5px;
        font-family: 'Arial', sans-serif;
    }

    .place {
        margin-left: 185px;
        font-family: 'Arial', sans-serif;
    }

    /* Optional CSS for better checkbox alignment */
    .house-status-checkbox {
        margin-right: 10px;
        margin-top: 5px;
        font-family: 'Arial', sans-serif;
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
        font-family: 'Arial', sans-serif;
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

    .label {
        font-size: 16px;
        font-family: 'Arial', sans-serif;
    }

    .ltitle {
        font-size: 16px;
        font-family: 'Arial', sans-serif;
    }

    .form-control1 {
        border-radius: 5px;
        border: 1px solid #ced4da;
        height: 30px;
        font-size: 14px;
        width: 100%;
        max-width: 250px;
        font-family: 'Arial', sans-serif;
    }

    .form-group1 {
        margin-bottom: 10px;
        margin-top: 30px;
        font-family: 'Arial', sans-serif;
    }


    .form-group1.row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-family: 'Arial', sans-serif;
    }


    .form-control-file1 {
        padding-top: 5px;
    }

    #add_child {
        background-color: blue;
        border-color: blue;
    }

    #add_representative {
        background-color: blue;
        border-color: blue;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }

    .form-check {
        margin-left: 12px;
    }

    .small-input {
        width: 200px;
        height: 30px;
        font-size: 14px;
    }

    .row {
        display: flex;
        justify-content: space-between;
    }

    .col-md-6 {
        display: flex;
        flex-direction: column;
        margin-right: 10px;
    }

    .form-group label {
        margin-bottom: 5px;
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

<body>
    <div class="container mt-5">
        <div class="logos">
            <img src="{{ asset('img/DSWDColored.png') }}" alt="DSWD Logo" class="dswd-logo">
            <img src="{{ asset('img/social-pension-logo.png') }}" alt="Social Pension Logo" class="social-pension-logo">
            <img src="{{ asset('img/BagongPilipinas.png') }}" alt="Bagong Pilipinas Logo" class="bagong-pilipinas-logo">
        </div>
        <h2 class="text-center">SOCIAL PENSION VALIDATION FORM</h2>
        <h3 class="soc">SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS</h3>

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
        <!-- Form Section -->
        <form action="{{ route('add.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group1 row">
                <div class="col-md-4">
                    <label class="label" for="osca_id"><strong>OSCA ID No. <span class="text-danger">*</span></strong></label>
                    <input type="text" class="form-control1" name="osca_id" id="osca_id" required>
                </div>

                <div class="col-md-4">
                    <label class="label" for="ncsc_rrn"><strong>NCSC RRN <span style="font-style:italic; font-weight:500;">(If Applicable)</span></strong></label>
                    <input type="text" class="form-control1" name="ncsc_rrn" id="ncsc_rrn">
                </div>

                <div class="col-md-4">
                    <label class="label" for="profile_upload"><strong>Upload Profile Picture: <span class="text-danger">*</span></strong></label>
                    <input type="file" class="form-control" name="profile_upload" id="profile_upload" required>
                </div>
            </div>
            <h4 class="section-title mb-3">I. IDENTIFYING INFORMATION <span style="font-style:italic;">(Pagkilala ng Impormasyon)</span></h4>
            <!-- Name Section -->
            <div class="form-group">
                <label class="label"><strong>1. NAME</strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="last_name">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="first_name">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="first_name" id="first_name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="middle_name">Middle Name </label>
                        <input type="text" class="form-control" name="middle_name" id="middle_name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="name_extension">Name Extension <span class="text-danger">*</span></label>
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
                <label class="label"><strong>2. MOTHER'S MAIDEN NAME</strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="mother_last_name">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mother_last_name" id="mother_last_name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="mother_first_name">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mother_first_name" id="mother_first_name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="mother_middle_name">Middle Name </label>
                        <input type="text" class="form-control" name="mother_middle_name" id="mother_middle_name">
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="form-group mt-4">
                <label class="label"><strong>3. PERMANENT ADDRESS -</strong> <span style="font-style:italic;"> Select region first, then province, then city, and finally your barangay</span></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        @php
                        $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                        $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                        $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                        $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                        @endphp
                        <label class="ltitle" for="region">Region <span class="text-danger">*</span></label>
                        <select class="form-control" id="permanent_address_region"
                            name="permanent_address_region" required>
                            <option value="">Select Region</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->psgc }}">{{ $region->col_region }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="province">Province <span class="text-danger">*</span></label>
                        <select class="form-control" id="permanent_address_province"
                            name="permanent_address_province" required>
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->psgc }}">{{ $province->col_province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="city">City <span class="text-danger">*</span></label>
                        <select class="form-control" id="permanent_address_city" name="permanent_address_city"
                            required>
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->psgc }}">{{ $city->col_citymuni }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="barangay">Barangay <span class="text-danger">*</span></label>
                        <select class="form-control" id="permanent_address_barangay"
                            name="permanent_address_barangay" required>
                            <option value="">Select Barangay</option>
                            @foreach ($barangays as $barangay)
                            <option value="{{ $barangay->psgc }}">{{ $barangay->col_brgy }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="ltitle" for="residence">Sitio/House No./Purok/Street <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="permanent_address_sitio"
                            placeholder="Sitio/House No./Purok/Street" required>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <label class="label"><strong>4. PRESENT ADDRESS -</strong> <span style="font-style:italic;"> Select region first, then province, then city, and finally your barangay</span></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        @php
                        $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                        $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                        $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                        $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                        @endphp
                        <label class="ltitle" for="region">Region <span class="text-danger">*</span></label>
                        <select class="form-control" id="present_address_region" name="present_address_region"
                            required>
                            <option value="">Select Region</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->psgc }}">{{ $region->col_region }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="province">Province <span class="text-danger">*</span></label>
                        <select class="form-control" id="present_address_province"
                            name="present_address_province" required>
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->psgc }}">{{ $province->col_province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="city">City <span class="text-danger">*</span></label>
                        <select class="form-control" id="present_address_city" name="present_address_city"
                            required>
                            <option value="">Select City/Municipality</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->psgc }}">{{ $city->col_citymuni }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="barangay">Barangay <span class="text-danger">*</span></label>
                        <select class="form-control" id="present_address_barangay"
                            name="present_address_barangay" required>
                            <option value="">Select Barangay</option>
                            @foreach ($barangays as $barangay)
                            <option value="{{ $barangay->psgc }}">{{ $barangay->col_brgy }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="ltitle" for="residence">Sitio/House No./Purok/Street <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="present_address_sitio"
                            placeholder="Sitio/House No./Purok/Street" required>
                    </div>
                </div>
            </div>

            <!-- Birth Date Section -->
            <div class="form-group mt-4">
                <label class="label"><strong>5. DATE OF BIRTH</strong></label>
                <label class="place"><strong>6. PLACE OF BIRTH</strong></label></span>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="date_of_birth">Birth Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                            max="{{ date('Y-m-d', strtotime('-60 years')) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="place_of_birth_city">City/Municipality <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="place_of_birth_city"
                            id="place_of_birth_city" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="place_of_birth_city">Province <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="place_of_birth_province"
                            id="place_of_birth_province" required>
                    </div>
                </div>
            </div>

            <div class="form-row custom-form-row">
                <div class="col-md-4 mb-3">
                    <label class="label" for="age"><strong>7. AGE</strong></label>
                    <input type="number" class="form-control" name="age" id="age" required readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label" for="sex"><strong>8. SEX <span class="text-danger">*</span></strong></label>
                    <select name="sex" id="sex" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label" for="civil_status"><strong>9. CIVIL STATUS <span class="text-danger">*</span></strong></label>
                    <select name="civil_status" id="civil_status" class="form-control" required>
                        <option value="">Select Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Separated">Separated</option>
                    </select>
                </div>
            </div>

            <div class="form-group mt-4">
                <label class="label" for="affiliation"><strong>10. AFFILIATION <span class="text-danger">*</span></strong> <span style="font-style:italic;">(Check all applicable)</span></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="affiliation[]" id="listahanan" value="Listahanan">
                            <label class="form-check-label" for="listahanan">Listahanan</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="affiliation[]" id="pantawid" value="Pantawid Beneficiary">
                            <label class="form-check-label" for="pantawid">Pantawid Beneficiary</label>
                        </div>
                        <input type="text" class="form-control mt-2" name="hh_id"
                            id="hh_id_group" style="display:none;"
                            placeholder="Specify HH ID (Itala)">
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="affiliation[]" id="indigenous" value="Indigenous People">
                            <label class="form-check-label" for="indigenous">Indigenous People (Mga Katutubo)</label>
                        </div>
                        <input type="text" class="form-control mt-2" name="indigenous_specify"
                            id="indigenous_specify_group" style="display:none;"
                            placeholder="Specify (Itala)">
                    </div>
                </div>
            </div>

            <h4 class="section-title mb-3">II. FAMILY INFORMATION <span style="font-style:italic;">(Impormasyon ng Pamilya)</span></h4>
            <div class="form-group">
                <label class="label"><strong>11. NAME OF SPOUSE </strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="spouse_last_name">Lastname <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="spouse_last_name" id="spouse_last_name"
                            required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="spouse_first_name">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="spouse_first_name"
                            id="spouse_first_name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="spouse_middle_name">Middle Name </label>
                        <input type="text" class="form-control" name="spouse_middle_name"
                            id="spouse_middle_name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="name_extension">Name Extension <span class="text-danger">*</span></label>
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
                <label class="label"><strong>12. SPOUSE ADDRESS - </strong> <span style="font-style:italic;"> Select region first, then province, then city, and finally your barangay</span></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="region">Region <span class="text-danger">*</span></label>
                        <select class="form-control" id="spouse_address_region" name="spouse_address_region"
                            required>
                            <option value="">Select Region</option>
                            @foreach ($regions as $region)
                            <option value="{{ $region->psgc }}">{{ $region->col_region }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="province">Province <span class="text-danger">*</span></label>
                        <select class="form-control" id="spouse_address_province"
                            name="spouse_address_province" required>
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->psgc }}">{{ $province->col_province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="city">City <span class="text-danger">*</span></label>
                        <select class="form-control" id="spouse_address_city" name="spouse_address_city"
                            required>
                            <option value="">Select City/Municipality</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->psgc }}">{{ $city->col_citymuni }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="barangay">Barangay <span class="text-danger">*</span></label>
                        <select class="form-control" id="spouse_address_barangay"
                            name="spouse_address_barangay" required>
                            <option value="">Select Barangay</option>
                            @foreach ($barangays as $barangay)
                            <option value="{{ $barangay->psgc }}">{{ $barangay->col_brgy }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="ltitle" for="residence">Sitio/House No./Purok/Street <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="spouse_address_sitio"
                            placeholder="Sitio/House No./Purok/Street" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="label"><strong>13. CONTACT NUMBER</strong> <span class="text-danger"> *</span></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-3 mb-3">
                        <label for="spouse_contact"></label>
                        <input type="text" class="form-control" id="spouse_contact" name="spouse_contact" required>
                    </div>
                </div>
            </div>
            <div class="form-group mt-4">
                <label class="label"><strong>14. CHILDREN INFORMATION</strong></label>
                <table class="table table-bordered" id="children_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Civil Status</th>
                            <th>Occupation</th>
                            <th>Income</th>
                            <th>Contact Number</th>
                            <th>
                                <button type="button" class="bi bi-plus-square btn btn-success" id="add_child"></button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="children[0][name]">
                            </td>
                            <td>
                                <select class="form-control" name="children[0][civil_status]">
                                    <option value="">Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control" name="children[0][occupation]"></td>
                            <td><input type="text" class="form-control" name="children[0][income]">
                            </td>
                            <td><input type="text" class="form-control" name="children[0][contact_number]">
                            </td>
                            <td><button type="button" class="bi bi-dash-square-dotted btn btn-danger remove_child"></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group mt-4">
                <label class="label"><strong>15. NAME OF AUTHORIZED REPRESENTATIVES</strong></label>
                <table class="table table-bordered" id="representatives_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Relationship</th>
                            <th>Contact Number</th>
                            <th><button type="button" class="bi bi-plus-square btn btn-success" id="add_representative"></button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="representatives[0][name]"></td>
                            <td><input type="text" class="form-control" name="representatives[0][relationship]"></td>
                            <td><input type="text" class="form-control"
                                    name="representatives[0][contact_number]"></td>
                            <td><button type="button"
                                    class="bi bi-dash-square-dotted btn btn-danger remove_representative"></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-group mt-4">
                <label class="label"><strong>16. LIVING ARRANGEMENT</strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-4">
                        <label class="ltitle">House Status</label>
                        <div class="form-check">
                            <input type="checkbox" name="house_status[]" value="Owned"
                                onclick="toggleCheckbox('house_status', this, false)"> Owned
                            <input type="checkbox" name="house_status[]" value="Rent"
                                onclick="toggleCheckbox('house_status', this, false)"> Rent
                            <input type="checkbox" name="house_status[]" value="Others"
                                onclick="toggleCheckbox('house_status', this, true)"> Others
                        </div>
                        <input type="text" class="form-control mt-2" name="house_status_others_input"
                            id="house_status_others_input" style="display:none;"
                            placeholder="Specify other house status">
                    </div>

                    <div class="col-md-8">
                        <label class="ltitle">Living Status</label>
                        <div class="form-check">
                            <input type="checkbox" name="living_status[]" value="Living Alone"
                                onclick="toggleCheckbox('living_status', this, false)"> Living Alone
                            <input type="checkbox" name="living_status[]" value="Living with spouse"
                                onclick="toggleCheckbox('living_status', this, false)"> Living with spouse
                            <input type="checkbox" name="living_status[]" value="Living with children"
                                onclick="toggleCheckbox('living_status', this, false)"> Living with children
                            <input type="checkbox" name="living_status[]" value="Others"
                                onclick="toggleCheckbox('living_status', this, true)"> Others
                        </div>
                        <input type="text" class="form-control mt-2" name="living_status_others_input"
                            id="living_status_others_input" style="display:none;"
                            placeholder="Specify other living status">
                    </div>
                </div>
            </div>

            <h4 class="section-title mb-3">III. ECONOMIC INFORMATION <span style="font-style:italic;">(Impormasyong Pang-ekonomiya)</span></h4>
            <div class="form-group mt-4">
                <label><strong></strong></label>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>How much</th>
                                <th>Source</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="ltitle" for="pension">Receiving Pension</label> <span class="text-danger"> *</span><br />
                                    <input type="checkbox" class="form-check-input" id="receiving_pension_yes" name="receiving_pension" value="Yes"
                                        onclick="handleCheckboxSelectionEco('receiving_pension', true, 'pension_amount', 'pension_source')" /> Yes
                                    <input type="checkbox" class="form-check-input" id="receiving_pension_no" name="receiving_pension" value="No"
                                        onclick="handleCheckboxSelectionEco('receiving_pension', false, 'pension_amount', 'pension_source')" /> No
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="pension_amount" name="pension_amount"
                                        placeholder="Enter amount" disabled style="cursor:not-allowed;" />
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="pension_source" name="pension_source"
                                        placeholder="Enter source" disabled style="cursor:not-allowed;" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="ltitle" for="permanent_income">Permanent Income</label> <span class="text-danger"> *</span><br />
                                    <input type="checkbox" class="form-check-input" id="permanent_income_yes" name="permanent_income" value="Yes"
                                        onclick="handleCheckboxSelectionEco('permanent_income', true, 'income_amount', 'income_source')" /> Yes
                                    <input type="checkbox" class="form-check-input" id="permanent_income_no" name="permanent_income" value="No"
                                        onclick="handleCheckboxSelectionEco('permanent_income', false, 'income_amount', 'income_source')" /> No
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="income_amount" name="income_amount"
                                        placeholder="Enter amount" disabled style="cursor:not-allowed;" />
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="income_source" name="income_source"
                                        placeholder="Enter source" disabled style="cursor:not-allowed;" />
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="ltitle" for="regular_support">Regular Support</label> <span class="text-danger"> *</span><br />
                                    <input type="checkbox" class="form-check-input" id="regular_support_yes" name="regular_support" value="Yes"
                                        onclick="handleCheckboxSelectionEco('regular_support', true, 'support_amount', 'support_source')" /> Yes
                                    <input type="checkbox" class="form-check-input" id="regular_support_no" name="regular_support" value="No"
                                        onclick="handleCheckboxSelectionEco('regular_support', false, 'support_amount', 'support_source')" /> No
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="support_amount" name="support_amount"
                                        placeholder="Enter amount" disabled style="cursor:not-allowed;" />
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="support_source" name="support_source"
                                        placeholder="Enter source" disabled style="cursor:not-allowed;" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="section-title mb-3">IV. HEALTH INFORMATION <span style="font-style:italic;">(Impormasyon sa Kalusugan)</span></h4>
            <div class="form-group">
                <label><strong></strong></label>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label class="ltitle">With Existing Illness</label> <span class="text-danger"> *</span></td>
                                <td>
                                    <input type="checkbox" class="form-check-input" id="existing_illness_yes" name="existing_illness" value="Yes"
                                        onclick="toggleFields('existing_illness', 'illness_specify')" /> Yes
                                    <input type="checkbox" class="form-check-input" id="existing_illness_none" name="existing_illness" value="None"
                                        onclick="toggleFields('existing_illness', 'illness_specify')" /> None
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="illness_specify" name="illness_specify" placeholder="Specify" disabled style="cursor:not-allowed;"/>
                                </td>
                            </tr>

                            <tr>
                                <td><label class="ltitle">With Disability</label> <span class="text-danger"> *</span></td>
                                <td>
                                    <input type="checkbox" class="form-check-input" id="with_disability_yes" name="with_disability" value="Yes"
                                        onclick="toggleFields('with_disability', 'disability_specify')" /> Yes
                                    <input type="checkbox" class="form-check-input" id="with_disability_none" name="with_disability" value="None"
                                        onclick="toggleFields('with_disability', 'disability_specify')" /> None
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="disability_specify" name="disability_specify" placeholder="Specify" disabled style="cursor:not-allowed;"/>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <label class="ltitle">Frailty Questions</label> <span class="text-danger"> *</span>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><label class="ltitle">1. Do you experience difficulty in doing your ADLs?</label>
                                <td><input type="checkbox" class="form-check-input" id="difficult_adl_yes" name="difficult_adl" value="Yes"
                                        onclick="handleCheckboxSelectionFra('difficult_adl', true)" /> Yes
                                    <input type="checkbox" class="form-check-input" id="difficult_adl_no" name="difficult_adl" value="No"
                                        onclick="handleCheckboxSelectionFra('difficult_adl', false)" /> No
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><label class="ltitle">2. Are you completely dependent on someone in doing your IADLs?</label></td>
                                <td><input type="checkbox" class="form-check-input" id="dependent_iadl_yes" name="dependent_iadl" value="Yes"
                                        onclick="handleCheckboxSelectionFra('dependent_iadl', true)" /> Yes
                                    <input type="checkbox" class="form-check-input" id="dependent_iadl_no" name="dependent_iadl" value="No"
                                        onclick="handleCheckboxSelectionFra('dependent_iadl', false)" /> No
                                <td></td>
                            </tr>
                            <tr>
                                <td><label class="ltitle">3. Are you experiencing weight loss, weakness, exhaustion?</label></td>
                                <td><input type="checkbox" class="form-check-input" id="experience_loss_yes" name="experience_loss"
                                        value="Yes" onclick="handleCheckboxSelectionFra('experience_loss', true)" />
                                    Yes
                                    <input type="checkbox" class="form-check-input" id="experience_loss_no" name="experience_loss" value="No"
                                        onclick="handleCheckboxSelectionFra('experience_loss', false)" /> No
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h4 class="section-title mb-3">V. ASSESSMENT <span style="font-style:italic;">(Pagtatasa)</span></h4>
            <div class="form-group">
                <label><strong></strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-12 mb-3">
                        <textarea rows="4" id="remarks" name="remarks" class="remarks" cols="100"></textarea>
                    </div>
                </div>
            </div>
            <h4 class="section-title mb-3">VI. RECOMMENDATION <span style="font-style:italic;"></span>(Rekomendasyon)</h4>
            <div class="form-group">
                <label><strong></strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-3 mb-3">
                        <label class="ltitle">Eligibility</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="eligibility_eligible" value="Eligible"
                                onclick="handleCheckboxSelection('eligibility', true)" />
                            <label class="form-check-label" for="eligibility_eligible">Eligible</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="eligibility_not_eligible"
                                value="Not Eligible" onclick="handleCheckboxSelection('eligibility', false)" />
                            <label class="form-check-label" for="eligibility_not_eligible">Not Eligible</label>
                        </div>
                    </div>
                    <input type="hidden" name="eligibility" id="eligibility_value" value="">
                </div>
            </div>
            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>

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
    // Get the checkboxes and the groups to show/hide
    const pantawidCheckbox = document.getElementById('pantawid');
    const hhIdGroup = document.getElementById('hh_id_group');

    const indigenousCheckbox = document.getElementById('indigenous');
    const indigenousSpecifyGroup = document.getElementById('indigenous_specify_group');

    // Event listener for Pantawid Beneficiary checkbox
    pantawidCheckbox.addEventListener('change', function() {
        if (this.checked) {
            hhIdGroup.style.display = 'block';
        } else {
            hhIdGroup.style.display = 'none';
        }
    });

    // Event listener for Indigenous People checkbox
    indigenousCheckbox.addEventListener('change', function() {
        if (this.checked) {
            indigenousSpecifyGroup.style.display = 'block';
        } else {
            indigenousSpecifyGroup.style.display = 'none';
        }
    });

    //Economic Information
    function handleCheckboxSelectionEco(field, isYes, amountFieldId, sourceFieldId) {
        const yesCheckbox = document.getElementById(`${field}_yes`);
        const noCheckbox = document.getElementById(`${field}_no`);
        const amountField = document.getElementById(amountFieldId);
        const sourceField = document.getElementById(sourceFieldId);

        yesCheckbox.addEventListener('change', function() {
            if (this.checked) {
                noCheckbox.checked = false; // Uncheck "No"
                amountField.disabled = false; // Enable amount field
                sourceField.disabled = false; // Enable source field
                amountField.focus(); // Optionally focus the amount field
            }
        });

        noCheckbox.addEventListener('change', function() {
            if (this.checked) {
                yesCheckbox.checked = false; // Uncheck "Yes"
                amountField.disabled = true; // Disable amount field
                sourceField.disabled = true; // Disable source field
                amountField.value = ''; // Optionally clear amount field
                sourceField.value = ''; // Optionally clear source field
            }
        });

        // Disable the fields by default if "Yes" is not checked
        if (!yesCheckbox.checked) {
            amountField.disabled = true;
            sourceField.disabled = true;
        }
    }


    //Health Information
    function toggleFields(groupName, specifyFieldId) {
        const yesCheckbox = document.getElementById(`${groupName}_yes`);
        const noCheckbox = document.getElementById(`${groupName}_none`);
        const specifyField = document.getElementById(specifyFieldId);

        // Handle the "Yes" checkbox
        yesCheckbox.addEventListener('change', function() {
            if (this.checked) {
                noCheckbox.checked = false; // Uncheck "None"
                specifyField.disabled = false; // Enable the input field
                specifyField.focus(); // Optionally focus the input field
            } else {
                specifyField.disabled = true; // Disable the input field if unchecked
            }
        });

        // Handle the "None" checkbox
        noCheckbox.addEventListener('change', function() {
            if (this.checked) {
                yesCheckbox.checked = false; // Uncheck "Yes"
                specifyField.disabled = true; // Disable the input field
                specifyField.value = ''; // Clear the input field
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
        const hiddenInput = document.getElementById(`${field}_value`);

        // Uncheck the other checkbox if one is checked
        if (isYes) {
            noCheckbox.checked = false;
            hiddenInput.value = yesCheckbox.value;
        } else {
            yesCheckbox.checked = false;
            hiddenInput.value = noCheckbox.value;
        }
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
    let childIndex = 1;

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
        <td><button type="button" class="bi bi-dash-square-dotted btn btn-danger remove_child"></button></td>
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
    let representativeIndex = 1;

    document.getElementById('add_representative').addEventListener('click', function() {
        const table = document.getElementById('representatives_table').getElementsByTagName('tbody')[0];
        const newRow = table.insertRow();

        newRow.innerHTML = `
        <td><input type="text" class="form-control" name="representatives[${representativeIndex}][name]" required></td>
         <td><input type="text" class="form-control" name="representatives[${representativeIndex}][relationship]" required></td>
        <td><input type="text" class="form-control" name="representatives[${representativeIndex}][contact_number]" required></td>
        <td><button type="button" class="bi bi-dash-square-dotted btn btn-danger remove_representative"></button></td>
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
@endsection