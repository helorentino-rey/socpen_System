<style>
    .modal-container {
        max-width: 800px;
        margin: 20px auto;
        margin-top: -15px;
        background: #ffffff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        font-family: 'Arial', sans-serif;
        color: #333;
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
        text-decoration: underline;
        font-family: 'Arial', sans-serif;
    }

    .table1 {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
        font-family: 'Arial', sans-serif;
    }

    .table1 th,
    .table1 td {
        text-align: center;
        vertical-align: middle;
        font-family: 'Arial', sans-serif;
    }

    .table1 .btn {
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
        margin-top: -70px;
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

    .table1 {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
        font-family: 'Arial', sans-serif;
    }

    .table1 th,
    .table1 td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        text-align: left;
        font-family: 'Arial', sans-serif;
    }

    .table1 th {
        font-size: 14px;
        font-weight: bold;
        background-color: #f8f9fa;
        padding: 10px;
        text-align: left;
        border-bottom: 2px solid #dee2e6;
        font-family: 'Arial', sans-serif;
    }

    .table1 td {
        padding: 8px;
        border-bottom: 1px solid #dee2e6;
        font-family: 'Arial', sans-serif;
    }

    .table1 input.form-control,
    .table1 select.form-control {
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

    /* For icon design */
    .icon-container {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        background-color: #f54242;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
        text-align: center;
        margin-top: 10px;
    }

    /* For modal content */
    .acm {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 1rem;
        margin: auto;
    }

    /* For close button */
    .custom-bton {
        background-color: transparent;
        border: 2px solid #4d4dff;
        color: #4d4dff;
    }
</style>

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
<div class="modal-container">
    <div class="container mt-5">
        <div class="logos">
            <img src="{{ asset('img/DSWDColored.png') }}" alt="DSWD Logo" class="dswd-logo">
            <img src="{{ asset('img/social-pension-logo.png') }}" alt="Social Pension Logo" class="social-pension-logo">
            <img src="{{ asset('img/BagongPilipinas.png') }}" alt="Bagong Pilipinas Logo" class="bagong-pilipinas-logo">
        </div>
        <h2 class="text-center">SOCIAL PENSION VALIDATION FORM</h2>
        <h3 class="soc">SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS</h3>

        <!-- Display Success Message -->
        @if (session('success'))
            <div class="alert alert-success d-none" id="successMessage">
                {{ session('success') }}
            </div>

            <!-- Success Modal -->
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
                aria-hidden="true">
                <div class="modal-dialog dlg">
                    <div class="modal-content acm">
                        <div class="iconic-container">
                            <i class="bi bi-check-lg icon-style"></i>
                        </div>
                        <div class="modal-body">
                            {{ session('success') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Section -->
        <form action="{{ route('beneficiaries.update', ['id' => $beneficiary->id]) }}" method="POST"
            enctype="multipart/form-data" class="edit-form">
            @csrf
            @method('PUT')
            <div class="form-group1 row">
                <div class="col-md-4">
                    <label class="label" for="osca_id"><strong>OSCA ID No. <span
                                class="text-danger">*</span></strong></label>
                    <input type="text" class="form-control1" name="osca_id" id="osca_id"
                        value="{{ $beneficiary->osca_id }}" required>
                </div>

                <div class="col-md-4">
                    <label class="label" for="ncsc_rrn"><strong>NCSC RRN <span
                                style="font-style:italic; font-weight:500;">(If Applicable)</span></strong></label>
                    <input type="text" class="form-control1" name="ncsc_rrn" id="ncsc_rrn" pattern="\d*"
                        inputmode="numeric" title="Please enter only numbers" maxlength="7"
                        value="{{ $beneficiary->ncsc_rrn }}">
                </div>

                <div class="col-md-4">
                    <label class="label" for="profile_upload"><strong>Upload Profile Picture: <span
                                class="text-danger">*</span></strong></label>
                    <input type="file" class="form-control" name="profile_upload" id="profile_upload">
                </div>
            </div>
            <h4 class="section-title mb-3">I. IDENTIFYING INFORMATION <span style="font-style:italic;">(Pagkilala ng
                    Impormasyon)</span></h4>
            <!-- Name Section -->
            <div class="form-group">
                <label class="label"><strong>1. NAME</strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="last_name">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="last_name" id="last_name"
                            pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ $beneficiary->BeneficiaryInfo->last_name }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="first_name">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="first_name" id="first_name"
                            pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ $beneficiary->BeneficiaryInfo->first_name }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="middle_name">Middle Name </label>
                        <input type="text" class="form-control" name="middle_name" id="middle_name"
                            pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ $beneficiary->BeneficiaryInfo->middle_name }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="name_extension">Name Extension <span
                                class="text-danger">*</span></label>
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
            </div>

            <div class="form-group">
                <label class="label"><strong>2. MOTHER'S MAIDEN NAME</strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="mother_last_name">Last Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mother_last_name" id="mother_last_name"
                            pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ old('mother_last_name', $beneficiary->MothersMaidenName->mother_last_name) }}"
                            required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="mother_first_name">First Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mother_first_name" id="mother_first_name"
                            pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ old('mother_first_name', $beneficiary->MothersMaidenName->mother_first_name) }}"
                            required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="mother_middle_name">Middle Name </label>
                        <input type="text" class="form-control" name="mother_middle_name" id="mother_middle_name"
                            pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ old('mother_middle_name', $beneficiary->MothersMaidenName->mother_middle_name) }}">
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="form-group mt-4">
                <label class="label"><strong>3. PERMANENT ADDRESS</strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        @php
                            $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                            $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                            $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                            $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                            $permanentAddress = $beneficiary->addresses->where('type', 'permanent')->first();
                        @endphp
                        <label class="ltitle" for="region">Region <span class="text-danger">*</span></label>
                        <select class="form-control" id="permanent_address_region" name="permanent_address_region"
                            required>
                            <option value="">Select Region</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->psgc }}"
                                    {{ $permanentAddress && $permanentAddress->region == $region->col_region ? 'selected' : '' }}>
                                    {{ $region->col_region }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="province">Province <span class="text-danger">*</span></label>
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
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="city">City <span class="text-danger">*</span></label>
                        <select class="form-control" id="permanent_address_city" name="permanent_address_city"
                            required>
                            <option value="">Select City</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->psgc }}"
                                    {{ $permanentAddress && $permanentAddress->city == $city->col_citymuni ? 'selected' : '' }}>
                                    {{ $city->col_citymuni }}
                                </option>
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
                                <option value="{{ $barangay->psgc }}"
                                    {{ $permanentAddress && $permanentAddress->barangay == $barangay->col_brgy ? 'selected' : '' }}>
                                    {{ $barangay->col_brgy }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="ltitle" for="residence">Sitio/House No./Purok/Street <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="permanent_address_sitio"
                            placeholder="Sitio/House No./Purok/Street" pattern="[A-Za-z0-9,\s\-\/]*"
                            title="Please enter a valid address format (letters, numbers, commas, spaces, dashes, and slashes are allowed)"
                            value="{{ old('permanent_address_sitio', $permanentAddress->sitio ?? '') }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <label class="label"><strong>4. PRESENT ADDRESS</strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        @php
                            $regions = App\Models\Region::orderBy('col_region', 'asc')->get();
                            $provinces = App\Models\Province::orderBy('col_province', 'asc')->get();
                            $cities = App\Models\CityMuni::orderBy('col_citymuni', 'asc')->get();
                            $barangays = App\Models\Barangay::orderBy('col_brgy', 'asc')->get();
                            $presentAddress = $beneficiary->addresses->where('type', 'present')->first();
                        @endphp
                        <label class="ltitle" for="region">Region <span class="text-danger">*</span></label>
                        <select class="form-control" id="present_address_region" name="present_address_region"
                            required>
                            @foreach ($regions as $region)
                                <option value="{{ $region->psgc }}"
                                    {{ $presentAddress && $presentAddress->region == $region->col_region ? 'selected' : '' }}>
                                    {{ $region->col_region }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="province">Province <span class="text-danger">*</span></label>
                        <select class="form-control" id="present_address_province" name="present_address_province"
                            required>
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->psgc }}"
                                    {{ $presentAddress && $presentAddress->province == $province->col_province ? 'selected' : '' }}>
                                    {{ $province->col_province }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="city">City <span class="text-danger">*</span></label>
                        <select class="form-control" id="present_address_city" name="present_address_city" required>
                            <option value="">Select City/Municipality</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->psgc }}"
                                    {{ $presentAddress && $presentAddress->city == $city->col_citymuni ? 'selected' : '' }}>
                                    {{ $city->col_citymuni }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="barangay">Barangay <span class="text-danger">*</span></label>
                        <select class="form-control" id="present_address_barangay" name="present_address_barangay"
                            required>
                            <option value="">Select Barangay</option>
                            @foreach ($barangays as $barangay)
                                <option value="{{ $barangay->psgc }}"
                                    {{ $presentAddress && $presentAddress->barangay == $barangay->col_brgy ? 'selected' : '' }}>
                                    {{ $barangay->col_brgy }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="ltitle" for="residence">Sitio/House No./Purok/Street <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="present_address_sitio"
                            placeholder="Sitio/House No./Purok/Street" pattern="[A-Za-z0-9,\s\-\/]*"
                            title="Please enter a valid address format (letters, numbers, commas, spaces, dashes, and slashes are allowed)"
                            value="{{ old('present_address_sitio', $presentAddress->sitio ?? '') }}" required>
                    </div>
                </div>
            </div>

            <!-- Birth Date Section -->
            <div class="form-group mt-4">
                <label class="label"><strong>5. DATE OF BIRTH</strong></label>
                <label class="place"><strong>6. PLACE OF BIRTH</strong></label></span>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="date_of_birth">Date of Birth <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                            max="{{ date('Y-m-d', strtotime('-60 years')) }}"
                            value="{{ old('date_of_birth', $beneficiary->MothersMaidenName->date_of_birth ?? '') }}"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="place_of_birth_city">City/Municipality <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="place_of_birth_city"
                            id="place_of_birth_city" pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ old('place_of_birth_city', $beneficiary->MothersMaidenName->place_of_birth_city ?? '') }}"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="place_of_birth_city">Province <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="place_of_birth_province"
                            id="place_of_birth_province" pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ old('place_of_birth_province', $beneficiary->MothersMaidenName->place_of_birth_province ?? '') }}"
                            required>
                    </div>
                </div>
            </div>

            <div class="form-row custom-form-row">
                <div class="col-md-4 mb-3">
                    <label class="label" for="age"><strong>7. AGE</strong> <span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="age" id="age"
                        value="{{ old('age', $beneficiary->MothersMaidenName->age ?? '') }}" required readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label" for="sex"><strong>8. SEX <span
                                class="text-danger">*</span></strong></label>
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
                <div class="col-md-4 mb-3">
                    <label class="label" for="civil_status"><strong>9. CIVIL STATUS <span
                                class="text-danger">*</span></strong></label>
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

            <div class="form-group mt-4">
                <label class="label" for="affiliation">
                    <strong>10. AFFILIATION <span class="text-danger">*</span></strong>
                    <span style="font-style:italic;">(Check all applicable)</span>
                </label>
                <div class="form-row custom-form-row">
                    <!-- Listahanan Checkbox -->
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="affiliation[]" id="listahanan"
                                value="Listahanan"
                                {{ in_array('Listahanan', explode(', ', $beneficiary->affiliation->affiliation_type ?? '')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="listahanan">Listahanan</label>
                        </div>
                    </div>

                    <!-- Pantawid Beneficiary Checkbox -->
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="affiliation[]" id="pantawid"
                                value="Pantawid Beneficiary"
                                {{ in_array('Pantawid Beneficiary', explode(', ', $beneficiary->affiliation->affiliation_type ?? '')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pantawid">Pantawid Beneficiary (Benepisyaryo ng
                                4Ps)</label>
                        </div>
                        <input type="text" class="form-control mt-2" name="hh_id" id="hh_id"
                            style="display:none;" placeholder="Specify HH ID (Itala)" pattern="[0-9\-]*"
                            title="Please enter only numbers and dashes"
                            value="{{ $beneficiary->affiliation->hh_id ?? '' }}">
                    </div>

                    <!-- Indigenous People Checkbox -->
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="affiliation[]" id="indigenous"
                                value="Indigenous People"
                                {{ in_array('Indigenous People', explode(', ', $beneficiary->affiliation->affiliation_type ?? '')) ? 'checked' : '' }}>
                            <label class="form-check-label" for="indigenous">Indigenous People (Mga Katutubo)</label>
                        </div>
                        <input type="text" class="form-control mt-2" name="indigenous_specify"
                            id="indigenous_specify" style="display:none;" placeholder="Specify (Itala)"
                            pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ $beneficiary->affiliation->indigenous_specify ?? '' }}">
                    </div>
                </div>
            </div>


            <h4 class="section-title mb-3">II. FAMILY INFORMATION <span style="font-style:italic;">(Impormasyon ng
                    Pamilya)</span></h4>
            <div class="form-group">
                <label class="label"><strong>11. NAME OF SPOUSE </strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="spouse_last_name">Lastname <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="spouse_last_name" id="spouse_last_name"
                            pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ old('spouse_last_name', $beneficiary->spouse->spouse_last_name ?? '') }}"
                            required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="spouse_first_name">First Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="spouse_first_name" id="spouse_first_name"
                            pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ old('spouse_first_name', $beneficiary->spouse->spouse_first_name ?? '') }}"
                            required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="spouse_middle_name">Middle Name </label>
                        <input type="text" class="form-control" name="spouse_middle_name" id="spouse_middle_name"
                            pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)*"
                            title="Please enter only letters, starting each word with a capital letter"
                            oninput="this.value = this.value.replace(/\b\w/g, char => char.toUpperCase())"
                            value="{{ old('spouse_middle_name', $beneficiary->spouse->spouse_middle_name ?? '') }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="ltitle" for="name_extension">Name Extension <span
                                class="text-danger">*</span></label>
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
            <div class="form-group mt-4">
                <label class="label"><strong>12. SPOUSE ADDRESS </strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="region">Region <span class="text-danger">*</span></label>
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
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="province">Province <span class="text-danger">*</span></label>
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
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="city">City <span class="text-danger">*</span></label>
                        <select class="form-control" id="spouse_address_city" name="spouse_address_city" required>
                            <option value="">Select City/Municipality</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->psgc }}"
                                    {{ $spouseAddress && $spouseAddress->city == $city->col_citymuni ? 'selected' : '' }}>
                                    {{ $city->col_citymuni }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row custom-form-row">
                    <div class="col-md-4 mb-3">
                        <label class="ltitle" for="barangay">Barangay <span class="text-danger">*</span></label>
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
                    <div class="col-md-8 mb-3">
                        <label class="ltitle" for="residence">Sitio/House No./Purok/Street <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="spouse_address_sitio"
                            placeholder="Sitio/House No./Purok/Street" pattern="[A-Za-z0-9,\s\-\/]*"
                            title="Please enter a valid address format (letters, numbers, commas, spaces, dashes, and slashes are allowed)"
                            value="{{ old('spouse_address_sitio', $spouseAddress->sitio ?? '') }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="label"><strong>13. CONTACT NUMBER</strong> <span class="text-danger"> *</span></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-3 mb-3">
                        <label for="spouse_contact"></label>
                        <input type="text" class="form-control" id="spouse_contact" name="spouse_contact"
                            pattern="\+63\d{10}" maxlength="13"
                            title="Please enter a valid contact number starting with +63 and followed by 10 digits"
                            value="{{ old('spouse_contact', $beneficiary->spouse->spouse_contact ?? '') }}" required>
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
                                <button type="button" class="bi bi-plus-square btn btn-success"
                                    id="add_child"></button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiary->child as $index => $child)
                            <tr>
                                <td><input type="text" class="form-control"
                                        name="children[{{ $index }}][name]" pattern="[A-Za-z\s\.]*"
                                        title="Please enter a valid name (letters, spaces, and periods are allowed)"
                                        value="{{ $child->children_name }}"></td>
                                <td>
                                    <select class="form-control" name="children[{{ $index }}][civil_status]">
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
                                        pattern="[A-Za-z0-9,\s\-\/]*"
                                        title="Please enter a valid occupation (letters, numbers, commas, spaces, dashes, and slashes are allowed)"
                                        value="{{ $child->children_occupation }}"></td>
                                <td><input type="text" class="form-control"
                                        name="children[{{ $index }}][income]" pattern="[0-9,]*"
                                        title="Please enter only numbers and commas"
                                        value="{{ $child->children_income }}">
                                </td>
                                <td><input type="text" class="form-control"
                                        name="children[{{ $index }}][contact_number]" pattern="\+63\d{10}"
                                        maxlength="13"
                                        title="Please enter a valid contact number starting with +63 and followed by 10 digits"
                                        value="{{ $child->children_contact_number }}">
                                </td>
                                <td><button type="button"
                                        class="bi bi-dash-square-dotted btn btn-danger remove_child"></button></td>
                            </tr>
                        @endforeach
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
                            <th><button type="button" class="bi bi-plus-square btn btn-success"
                                    id="add_representative"></button></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiary->representative as $index => $representative)
                            <tr>
                                <td><input type="text" class="form-control"
                                        name="representatives[{{ $index }}][name]" pattern="[A-Za-z\s\.]*"
                                        title="Please enter a valid name (letters, spaces, and periods are allowed)"
                                        value="{{ $representative->representative_name }}"></td>
                                <td><input type="text" class="form-control"
                                        name="representatives[{{ $index }}][relationship]"
                                        pattern="[A-Za-z\s\.]*"
                                        title="Please enter a valid name (letters, spaces, and periods are allowed)"
                                        value="{{ $representative->representative_relationship }}"></td>
                                <td><input type="text" class="form-control"
                                        name="representatives[{{ $index }}][contact_number]"
                                        pattern="\+63\d{10}" maxlength="13"
                                        title="Please enter a valid contact number starting with +63 and followed by 10 digits"
                                        value="{{ $representative->representative_contact_number }}"></td>
                                <td><button type="button"
                                        class="bi bi-dash-square-dotted btn btn-danger remove_representative"></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @php
                $houseStatus = explode(',', $beneficiary->housingLivingStatus->house_status ?? '');
                $livingStatus = explode(',', $beneficiary->housingLivingStatus->living_status ?? '');
            @endphp

            <div class="form-group mt-4">
                <label class="label"><strong>16. LIVING ARRANGEMENT</strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-4">
                        <label class="ltitle">House Status</label>
                        <div class="form-check">
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
                            placeholder="Specify other house status" pattern="[A-Za-z\s]*"
                            title="Please enter a valid house status (letters, and spaces are allowed)"
                            value="{{ $beneficiary->housingLivingStatus->house_status_others_input ?? '' }}">
                    </div>

                    <div class="col-md-8">
                        <label class="ltitle">Living Status</label>
                        <div class="form-check">
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
                            placeholder="Specify other living status" pattern="[A-Za-z\s]*"
                            title="Please enter a valid house status (letters, and spaces are allowed)"
                            value="{{ $beneficiary->housingLivingStatus->living_status_others_input ?? '' }}">
                    </div>
                </div>
            </div>

            <h4 class="section-title mb-3">III. ECONOMIC INFORMATION <span style="font-style:italic;">(Impormasyong
                    Pang-ekonomiya)</span></h4>
            <div class="form-group mt-4">
                <label><strong></strong></label>
                <div class="table-responsive">
                    <table class="table1">
                        <thead>
                            <tr>
                                <th></th>
                                <th>How much</th>
                                <th>Source</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label class="ltitle" for="pension">Receiving Pension</label>
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
                                </td>
                                <td><input type="text" class="form-control mt-2" id="pension_amount"
                                        name="pension_amount" placeholder="Enter amount" pattern="[0-9,]*"
                                        title="Please enter only numbers and commas"
                                        value="{{ $beneficiary->economicInformation->pension_amount ?? '' }}"
                                        {{ $beneficiary->economicInformation->receiving_pension == 'Yes' ? '' : 'disabled' }} />
                                </td>
                                <td><input type="text" class="form-control mt-2" id="pension_source"
                                        name="pension_source" placeholder="Enter source" pattern="[A-Za-z,]*"
                                        title="Please enter only letters and commas"
                                        value="{{ $beneficiary->economicInformation->pension_source ?? '' }}"
                                        {{ $beneficiary->economicInformation->receiving_pension == 'Yes' ? '' : 'disabled' }} />
                                </td>
                            </tr>
                            <tr>
                                <td><label class="ltitle" for="permanent_income">Permanent Income</label>
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
                                </td>
                                <td><input type="text" class="form-control mt-2" id="income_amount"
                                        name="income_amount" placeholder="Enter amount" pattern="[0-9,]*"
                                        title="Please enter only numbers and commas"
                                        value="{{ $beneficiary->economicInformation->income_amount ?? '' }}"
                                        {{ $beneficiary->economicInformation->permanent_income == 'Yes' ? '' : 'disabled' }} />
                                </td>
                                <td><input type="text" class="form-control mt-2" id="income_source"
                                        name="income_source" placeholder="Enter source" pattern="[A-Za-z,]*"
                                        title="Please enter only letters and commas"
                                        value="{{ $beneficiary->economicInformation->income_source ?? '' }}"
                                        {{ $beneficiary->economicInformation->permanent_income == 'Yes' ? '' : 'disabled' }} />
                                </td>
                            </tr>
                            <tr>
                                <td><label class="ltitle" for="regular_support">Regular Support</label>
                                    <br />
                                    <input type="checkbox" id="regular_support_yes" name="regular_support"
                                        value="Yes"
                                        onclick="handleCheckboxSelectionEco('regular_support', true, 'support_amount', 'support_source')"
                                        {{ $beneficiary->economicInformation->regular_support == 'Yes' ? 'checked' : '' }} />
                                    Yes
                                    <input type="checkbox" id="regular_support_no" name="regular_support"
                                        value="No"
                                        onclick="handleCheckboxSelectionEco('regular_support', false, 'support_amount', 'support_source')"
                                        {{ $beneficiary->economicInformation->regular_support == 'No' ? 'checked' : '' }} />
                                    No
                                </td>
                                <td><input type="text" class="form-control mt-2" id="support_amount"
                                        name="support_amount" placeholder="Enter amount" pattern="[0-9,]*"
                                        title="Please enter only numbers and commas"
                                        value="{{ $beneficiary->economicInformation->support_amount ?? '' }}"
                                        {{ $beneficiary->economicInformation->regular_support == 'Yes' ? '' : 'disabled' }} />
                                </td>
                                <td><input type="text" class="form-control mt-2" id="support_source"
                                        name="support_source" placeholder="Enter source" pattern="[A-Za-z,]*"
                                        title="Please enter only letters and commas"
                                        value="{{ $beneficiary->economicInformation->support_source ?? '' }}"
                                        {{ $beneficiary->economicInformation->regular_support == 'Yes' ? '' : 'disabled' }} />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="section-title mb-3">IV. HEALTH INFORMATION <span style="font-style:italic;">(Impormasyon sa
                    Kalusugan)</span></h4>
            <div class="form-group">
                <label><strong></strong></label>
                <div class="table-responsive">
                    <table class="table1">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label class="ltitle">With Existing Illness</label>
                                <td><input type="checkbox" id="existing_illness_yes" name="existing_illness"
                                        value="Yes" onclick="toggleFields('existing_illness', 'illness_specify')"
                                        {{ $beneficiary->healthInformation->existing_illness == 'Yes' ? 'checked' : '' }} />
                                    Yes
                                    <input type="checkbox" id="existing_illness_none" name="existing_illness"
                                        value="None" onclick="toggleFields('existing_illness', 'illness_specify')"
                                        {{ $beneficiary->healthInformation->existing_illness == 'None' ? 'checked' : '' }} />
                                    None
                                </td>
                                <td><input type="text" class="form-control mt-2" id="illness_specify"
                                        name="illness_specify" placeholder="Specify" pattern="[A-Za-z,]*"
                                        title="Please enter only letters and commas"
                                        {{ $beneficiary->healthInformation->existing_illness == 'Yes' ? '' : 'disabled' }}
                                        value="{{ $beneficiary->healthInformation->illness_specify ?? '' }}" /></td>
                            </tr>
                            <tr>
                                <td><label class="ltitle">With Disability</label></td>
                                <td><input type="checkbox" id="with_disability_yes" name="with_disability"
                                        value="Yes" onclick="toggleFields('with_disability', 'disability_specify')"
                                        {{ $beneficiary->healthInformation->with_disability == 'Yes' ? 'checked' : '' }} />
                                    Yes
                                    <input type="checkbox" id="with_disability_none" name="with_disability"
                                        value="None" onclick="toggleFields('with_disability', 'disability_specify')"
                                        {{ $beneficiary->healthInformation->with_disability == 'None' ? 'checked' : '' }} />
                                    None
                                </td>
                                <td><input type="text" class="form-control mt-2" id="disability_specify"
                                        name="disability_specify" placeholder="Specify" pattern="[A-Za-z,]*"
                                        title="Please enter only letters and commas"
                                        {{ $beneficiary->healthInformation->with_disability == 'Yes' ? '' : 'disabled' }}
                                        value="{{ $beneficiary->healthInformation->disability_specify ?? '' }}" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <label class="ltitle">Frailty Questions</label>
                <div class="table-responsive">
                    <table class="table1">
                        <tbody>
                            <tr>
                                <td><label class="ltitle">1. Do you experience difficulty in doing your ADLs?</label>
                                <td><input type="checkbox" id="difficult_adl_yes" name="difficult_adl"
                                        value="Yes" onclick="handleCheckboxSelectionFra('difficult_adl', true)"
                                        {{ $beneficiary->healthInformation->difficult_adl == 'Yes' ? 'checked' : '' }} />
                                    Yes
                                    <input type="checkbox" id="difficult_adl_no" name="difficult_adl" value="No"
                                        onclick="handleCheckboxSelectionFra('difficult_adl', false)"
                                        {{ $beneficiary->healthInformation->difficult_adl == 'No' ? 'checked' : '' }} />
                                    No
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><label class="ltitle">2. Are you completely dependent on someone in doing your
                                        IADLs?</label></td>
                                <td><input type="checkbox" id="dependent_iadl_yes" name="dependent_iadl"
                                        value="Yes" onclick="handleCheckboxSelectionFra('dependent_iadl', true)"
                                        {{ $beneficiary->healthInformation->dependent_iadl == 'Yes' ? 'checked' : '' }} />
                                    Yes
                                    <input type="checkbox" id="dependent_iadl_no" name="dependent_iadl"
                                        value="No" onclick="handleCheckboxSelectionFra('dependent_iadl', false)"
                                        {{ $beneficiary->healthInformation->dependent_iadl == 'No' ? 'checked' : '' }} />
                                    No
                                <td></td>
                            </tr>
                            <tr>
                                <td><label class="ltitle">3. Are you experiencing weight loss, weakness,
                                        exhaustion?</label></td>
                                <td><input type="checkbox" id="experience_loss_yes" name="experience_loss"
                                        value="Yes" onclick="handleCheckboxSelectionFra('experience_loss', true)"
                                        {{ $beneficiary->healthInformation->experience_loss == 'Yes' ? 'checked' : '' }} />
                                    Yes
                                    <input type="checkbox" id="experience_loss_no" name="experience_loss"
                                        value="No" onclick="handleCheckboxSelectionFra('experience_loss', false)"
                                        {{ $beneficiary->healthInformation->experience_loss == 'No' ? 'checked' : '' }} />
                                    No
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
                        <textarea rows="4" id="remarks" name="remarks" class="remarks" cols="85">{{ $beneficiary->assessmentRecommendation->remarks ?? '' }}</textarea>
                    </div>
                </div>
            </div>
            <h4 class="section-title mb-3">VI. RECOMMENDATION <span style="font-style:italic;"></span>(Rekomendasyon)
            </h4>
            <div class="form-group">
                <label><strong></strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-3 mb-3">
                        <label class="ltitle">Eligibility</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="eligibility_eligible"
                                value="Eligible" onclick="handleCheckboxSelection('eligibility', true)"
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
                </div>
            </div>
            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    //Checkboxes
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('.edit-form');
        forms.forEach(function(form) {
            form.addEventListener('submit', function(event) {
                const houseStatusCheckboxes = form.querySelectorAll(
                    'input[name="house_status[]"]');
                const livingStatusCheckboxes = form.querySelectorAll(
                    'input[name="living_status[]"]');
                const receivingPensionCheckboxes = form.querySelectorAll(
                    'input[name="receiving_pension"]');
                const permanentIncomeCheckboxes = form.querySelectorAll(
                    'input[name="permanent_income"]');
                const regularSupportCheckboxes = form.querySelectorAll(
                    'input[name="regular_support"]');
                const existingIllnessCheckboxes = form.querySelectorAll(
                    'input[name="existing_illness"]');
                const withDisabilityCheckboxes = form.querySelectorAll(
                    'input[name="with_disability"]');
                const difficultAdlCheckboxes = form.querySelectorAll(
                    'input[name="difficult_adl"]');
                const dependentIadlCheckboxes = form.querySelectorAll(
                    'input[name="dependent_iadl"]');
                const experienceLossCheckboxes = form.querySelectorAll(
                    'input[name="experience_loss"]');

                let isHouseStatusChecked = false;
                let isLivingStatusChecked = false;
                let isReceivingPensionChecked = false;
                let isPermanentIncomeChecked = false;
                let isRegularSupportChecked = false;
                let isExistingIllnessChecked = false;
                let isWithDisabilityChecked = false;
                let isDifficultAdlChecked = false;
                let isDependentIadlChecked = false;
                let isExperienceLossChecked = false;

                houseStatusCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isHouseStatusChecked = true;
                    }
                });

                livingStatusCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isLivingStatusChecked = true;
                    }
                });

                receivingPensionCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isReceivingPensionChecked = true;
                    }
                });

                permanentIncomeCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isPermanentIncomeChecked = true;
                    }
                });

                regularSupportCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isRegularSupportChecked = true;
                    }
                });

                existingIllnessCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isExistingIllnessChecked = true;
                    }
                });

                withDisabilityCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isWithDisabilityChecked = true;
                    }
                });

                difficultAdlCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isDifficultAdlChecked = true;
                    }
                });

                dependentIadlCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isDependentIadlChecked = true;
                    }
                });

                experienceLossCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isExperienceLossChecked = true;
                    }
                });

                if (!isHouseStatusChecked || !isLivingStatusChecked || !
                    isReceivingPensionChecked || !isPermanentIncomeChecked || !
                    isRegularSupportChecked || !isExistingIllnessChecked || !
                    isWithDisabilityChecked || !isDifficultAdlChecked || !
                    isDependentIadlChecked || !isExperienceLossChecked) {
                    event.preventDefault();
                    alert('Please select at least one option for each category.');
                }
            });
        });
    });

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
        const hhIdField = document.getElementById('hh_id');
        const indigenousCheckbox = document.getElementById('indigenous');
        const indigenousSpecifyField = document.getElementById('indigenous_specify');

        // Set initial state of checkboxes
        // listahananCheckbox.checked = affiliationTypes.includes('Listahanan');
        // pantawidCheckbox.checked = affiliationTypes.includes('Pantawid Beneficiary');
        // indigenousCheckbox.checked = affiliationTypes.includes('Indigenous People');

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
        // listahananCheckbox.addEventListener('change', function() {
        //     if (this.checked) {
        //         pantawidCheckbox.checked = false;
        //         hhIdField.value = '';
        //         hhIdGroup.style.display = 'none';

        //         indigenousCheckbox.checked = false;
        //         indigenousSpecifyField.value = '';
        //         indigenousSpecifyGroup.style.display = 'none';
        //     }
        // });
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

        // Enable or disable fields based on the Yes/No selection
        if (yesCheckbox.checked) {
            amountField.removeAttribute('disabled');
            sourceField.removeAttribute('disabled');
            amountField.style.cursor = ''; // Remove 'not-allowed' when enabled
            sourceField.style.cursor = ''; // Remove 'not-allowed' when enabled
        } else {
            amountField.setAttribute('disabled', 'true');
            sourceField.setAttribute('disabled', 'true');
            amountField.style.cursor = 'not-allowed'; // Apply 'not-allowed' when disabled
            sourceField.style.cursor = 'not-allowed'; // Apply 'not-allowed' when disabled
        }
    }

    //Health Information
    function toggleFields(groupName, specifyFieldId) {
        const yesCheckbox = document.getElementById(`${groupName}_yes`);
        const noCheckbox = document.getElementById(`${groupName}_none`);
        const specifyField = document.getElementById(specifyFieldId);

        yesCheckbox.addEventListener('change', () => {
            if (yesCheckbox.checked) {
                specifyField.removeAttribute('disabled'); // Enable field
                noCheckbox.checked = false;
            } else {
                specifyField.setAttribute('disabled', 'true'); // Disable field
            }
        });

        noCheckbox.addEventListener('change', () => {
            if (noCheckbox.checked) {
                specifyField.setAttribute('disabled', 'true'); // Disable field
                specifyField.value = ''; // Clear the input field
                yesCheckbox.checked = false;
            }
        });

        // Initial state setup: Disable the field if "None" is checked
        if (noCheckbox.checked) {
            specifyField.setAttribute('disabled', 'true');
        }
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
        <td><input type="text" class="form-control" name="children[${childIndex}][name]"></td>
        <td>
            <select class="form-control" name="children[${childIndex}][civil_status]">
                <option value="">Civil Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Separated">Separated</option>
            </select>
        </td>
        <td><input type="text" class="form-control" name="children[${childIndex}][occupation]"></td>
        <td><input type="text" class="form-control" name="children[${childIndex}][income]"></td>
        <td><input type="text" class="form-control" name="children[${childIndex}][contact_number]"></td>
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
    let representativeIndex = {{ count($beneficiary->representative) }};

    document.getElementById('add_representative').addEventListener('click', function() {
        const table = document.getElementById('representatives_table').getElementsByTagName('tbody')[0];
        const newRow = table.insertRow();

        newRow.innerHTML = `
        <td><input type="text" class="form-control" name="representatives[${representativeIndex}][name]"></td>
       <td><input type="text" class="form-control" name="representatives[${representativeIndex}][relationship]"></td>
        <td><input type="text" class="form-control" name="representatives[${representativeIndex}][contact_number]" ></td>
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
