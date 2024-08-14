@extends('layouts.admin')

@section('content')
<style>
.container {
    width: calc(100% - 300px); /* Adjust this width based on your sidebar's width */
    max-width: none;
    margin-left: 150px; /* Aligns content with the sidebar */
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
    background-color: #f8f9fa; /* Light gray background */
    border-bottom: 2px solid #343a40; /* Darker border at the bottom */
    padding: 1rem 2rem; /* Padding for a better look */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

/* Navbar brand */
.navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
    color: #343a40; /* Dark gray text color */
    text-transform: uppercase;
}

/* Navbar links */
.navbar-nav .nav-link {
    font-size: 1rem;
    color: #495057; /* Medium gray text color */
    padding: 0.5rem 1rem;
    transition: color 0.3s ease-in-out;
    border-radius: 0.25rem;
}

/* Hover and active states for navbar links */
.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
    color: #ffffff; /* White text on hover */
    background-color: #343a40; /* Dark gray background on hover */
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
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4" style="border: 1px solid black;">
        <div class="container-fluid">
            <div class="navbar-brand" style="color: black;">Beneficiary</div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.beneficiaries.approve') }}" class="nav-link" style="color: black;">Approve Beneficiaries</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.beneficiaries.create') }}" class="nav-link" style="color: black;">Add Beneficiary</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.beneficiaries.list') }}" class="nav-link" style="color: black;">List of Beneficiaries</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
    <div class="card">
        <div class="card-body">
            <div class="section-header">
                <div class="profile-pic" id="profile_pic"></div>
                <div class="profile-info">
                    <h2></h2>
                    <div class="profile-details">
                        <div>
                            <p id="osca_id">OSCA ID No. </p>
                            <p id="ncsc_rrn">NCSC RRN: </p>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>


            <h6 class="mt-4">I. Identifying Information</h6>
            <h6 class="mt-4">Name</h6>
            <div class="form-row">
                <div class="form-col">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-col">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-col">
                    <label for="middlename" class="form-label">Middlename</label>
                    <input type="text" class="form-control" id="middlename" name="middlename">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="name_extension" class="form-label">Name Extension</label>
                    <input type="text" class="form-control" id="name_extension" name="name_extension" placeholder="N/A">
                </div>
            </div>
            <h6 class="mt-4">Mother's Name</h6>
            <div class="form-row">
                <div class="form-col">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-col">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-col">
                    <label for="middlename" class="form-label">Middlename</label>
                    <input type="text" class="form-control" id="middlename" name="middlename">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="name_extension" class="form-label">Name Extension</label>
                    <input type="text" class="form-control" id="name_extension" name="name_extension" placeholder="N/A">
                </div>
            </div>
            <h6 class="mt-4">Permanent Address</h6>
            <div class="form-row">
                <div class="form-col">
                    <label for="lastname" class="form-label">Sitio/House No./Purok/Street</label>
                    <input type="text" class="form-control" id="house_no" name="house_no" required>
                </div>
                <div class="form-col">
                    <label for="firstname" class="form-label">Barangay</label>
                    <input type="text" class="form-control" id="barangay" name="Barangay" required>
                </div>
                <div class="form-col">
                    <label for="middlename" class="form-label">City/Municipality</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="name_extension" class="form-label">Province</label>
                    <input type="text" class="form-control" id="province" name="province">
                </div>
                <div class="form-col">
                    <label for="sex" class="form-label">Region</label>
                    <input type="text" class="form-control" id="region" name="region">
                </div>
            </div>
            <h6 class="mt-4">Present Address</h6>
            <div class="form-row">
                <div class="form-col">
                    <label for="lastname" class="form-label">Sitio/House No./Purok/Street</label>
                    <input type="text" class="form-control" id="present_house" name="present_house" required>
                </div>
                <div class="form-col">
                    <label for="firstname" class="form-label">Barangay</label>
                    <input type="text" class="form-control" id="present_barangay" name="present_barangay" required>
                </div>
                <div class="form-col">
                    <label for="middlename" class="form-label">City/Municipality</label>
                    <input type="text" class="form-control" id="present_city" name="present_city">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="name_extension" class="form-label">Province</label>
                    <input type="text" class="form-control" id="present_province" name="present_province">
                </div>
                <div class="form-col">
                    <label for="sex" class="form-label">Region</label>
                    <input type="text" class="form-control" id="present_region" name="present_region">
                </div>
            </div>
            <h6 class="mt-4">Birth Information</h6>
            <div class="form-row">
                <div class="form-col">
                    <label for="lastname" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="date_birth" name="date_birth" required>
                </div>
                <div class="form-col">
                    <label for="firstname" class="form-label">City/Municipality</label>
                    <input type="text" class="form-control" id="birth_city" name="birth_city" required>
                </div>
                <div class="form-col">
                    <label for="middlename" class="form-label">Province</label>
                    <input type="text" class="form-control" id="birth_province" name="birth_province">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="name_extension" class="form-label">Age</label>
                    <input type="text" class="form-control" id="age" name="age">
                </div>
                <div class="form-col">
                    <label for="sex" class="form-label">Sex</label>
                    <select class="form-select" id="sex" name="sex" required>
                        <option value="">Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <h6 class="mt-4">Status</h6>
            <div class="form-row">
                <div class="form-col">
                    <label for="lastname" class="form-label">Civil Status</label>
                    <select class="form-select" id="civil_status" name="civil_status" required>
                        <option value="">Choose...</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widoweded</option>
                    </select>
                </div>
            </div>
            <h6 class="mt-4">Affiliation</h6>
            <div class="form-row">
                <div class="income-table">
                    <div class="income-header">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="income-row">
                        <div>
                            <label for="affiliation">Listahan</label>
                        </div>
                        <div><input type="checkbox" id="listahan_yes" name="listahan_yes" />
                        </div>
                        <div><input type="text" id="affiliation_hhid" name="affiliation_hhid" placeholder="Specify" /></div>
                    </div>
                    <div class="income-row">
                        <div>
                            <label for="pantawid">Pantawid Beneficiary</label>
                        </div>
                        <div><input type="checkbox" id="pantawid_yes" name="pantawid_yes" />

                        </div>
                        <div></div>
                    </div>
                    <div class="income-row">
                        <div>
                            <label for="indigenous">Indigenous People</label>
                        </div>
                        <div><input type="checkbox" id="indigenous_yes" name="indigenous_yes" />

                        </div>
                        <div><input type="text" id="affiliation_id" name="affiliation_id" placeholder="Specify" /></div>
                    </div>
                </div>
            </div>
            <h6 class="mt-4">II. Family Information</h6>
            <h6 class="mt-4">Name of Spouse</h6>
            <div class="form-row">
                <div class="form-col">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-col">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-col">
                    <label for="middlename" class="form-label">Middlename</label>
                    <input type="text" class="form-control" id="middlename" name="middlename">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="name_extension" class="form-label">Name Extension</label>
                    <input type="text" class="form-control" id="name_extension" name="name_extension">
                </div>
                <div class="form-col">
                    <label for="name_extension" class="form-label">Address</label>
                    <input type="text" class="form-control" id="name_extension" name="name_extension" placeholder="N/A">
                </div>
                <div class="form-col">
                    <label for="name_extension" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="name_extension" name="name_extension" placeholder="N/A">
                </div>
            </div>
            <h6 class="mt-4">Children</h6>
            <div class="form-row">
                <div class="form-col">
                    <label for="lastname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-col">
                    <label for="firstname" class="form-label">Civil Status</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-col">
                    <label for="middlename" class="form-label">Occupation</label>
                    <input type="text" class="form-control" id="middlename" name="middlename">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="name_extension" class="form-label">Income</label>
                    <input type="text" class="form-control" id="name_extension" name="name_extension">
                </div>
                <div class="form-col">
                    <label for="name_extension" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="name_extension" name="name_extension" placeholder="N/A">
                </div>
            </div>
            <h6 class="mt-4">Name of Authorized Reporesentatives</h6>
            <div class="form-row">
                <div class="form-col">
                    <label for="lastname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="auth_name" name="auth_name" required>
                </div>
                <div class="form-col">
                    <label for="firstname" class="form-label">Civil Status</label>
                    <input type="text" class="form-control" id="civil_status" name="civil_status" required>
                </div>
                <div class="form-col">
                    <label for="middlename" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number">
                </div>
            </div>
            <h6 class="mt-4">Name of Caregiver</h6>
            <div class="form-row">
                <div class="form-col">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="form-col">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="form-col">
                    <label for="middlename" class="form-label">Middlename</label>
                    <input type="text" class="form-control" id="middlename" name="middlename">
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="name_extension" class="form-label">Name Extension</label>
                    <input type="text" class="form-control" id="name_extension" name="name_extension">
                </div>
                <div class="form-col">
                    <label for="name_extension" class="form-label">Relationship</label>
                    <input type="text" class="form-control" id="relations" name="relations" placeholder="N/A">
                </div>
                <div class="form-col">
                    <label for="name_extension" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="N/A">
                </div>
            </div>
            <h6 class="mt-4">Living Arrangement</h6>
            <div class="form-row">
                <div class="income-table">
                    <div class="income-header">
                        <div></div>
                        <div>House</div>
                        <div>Living with</div>
                    </div>
                    <div class="income-row">
                        <div>
                        </div>
                        <div><input type="radio" id="owned_yes" name="house_status" />
                            <label for="owned_yes">Owned</label>
                            <br />
                            <input type="radio" id="rent_yes" name="house_status" />
                            <label for="rent_yes">Rent</label>
                            <br />
                            <label for="others_yes">Others:</label>
                            <input type="text" id="others_yes" name="house_status" />
                        </div>
                        <div><input type="radio" id="alone_yes" name="living_status" />
                            <label for="alone_yes">Living Alone</label>
                            <br />
                            <input type="radio" id="spouse_yes" name="living_status" />
                            <label for="spouse_yes">Living with Spouse</label>
                            <br />
                            <input type="radio" id="children_yes" name="living_status" />
                            <label for="children_yes">Living with Children</label>
                            <br />
                            <label for="others_yes">Others:</label>
                            <input type="" id="others_yes" name="living_status" />
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="mt-4">III. Economic Information</h6>
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
                        <div><input type="text" id="pension_amount" name="receivingPension" placeholder="Enter amount" />
                        </div>
                        <div><input type="text" id="pension_source" name="receivingPension" placeholder="Enter source" /></div>
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
                        <div><input type="text" id="income_amount" name="permanentIncome" placeholder="Enter amount" />
                        </div>
                        <div><input type="text" id="income_source" name="permanentIncome" placeholder="Enter source" /></div>
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
                        <div><input type="text" id="support_amount" name="regularSupport" placeholder="Enter amount" />
                        </div>
                        <div><input type="text" id="support_source" name="regularSupport" placeholder="Enter source" /></div>
                    </div>
                </div>
            </div>
            <h6 class="mt-4">IV. Health Information</h6>
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
                        <div><input type="text" id="illness_specify" name="existingIllness" placeholder="Specify" /></div>
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
                        <div><input type="text" id="disability_specify" name="withDisability" placeholder="Specify" /></div>
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
            <h6 class="mt-4">V. Assessment</h6>
            <div class="form-row">
                <div class="remarks">
                    <textarea rows="4" cols="50"></textarea>
                </div>
            </div>
            <h6 class="mt-4">VI. Recommendation</h6>
            <div class="form-row">
                <div>
                    <input type="radio" id="recommendationsssessment_yes" name="recommendationAssessment" />
                    <label for="recommendationsssessment_yes">Eligible</label>
                    <input type="radio" id="recommendationsssessment_no" name="recommendationAssessment" />
                    <label for="recommendationsssessment_no">Not Eligible</label>
                </div>
            </div>
            <h6 class="mt-4">Validated by:</h6>
            <div class="form-row">
                <div class="income-table">
                    <div class="income-header">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="income-row">
                        <div>
                            <label class="signature-box"><input type="file" class="file-input" name="validatedname" id="validated_name"></label>
                            <label for="validated_name">Signature over printed name</label>
                        </div>
                        <div>
                            <label class="signature-box"><input type="file" class="file-input" name="validateddesignation" id="validated_designation"></label>
                            
                            <label for="validated_designation">Designation</label>  
                        </div>
                        <div>
                        <label><input type="date" name="validateddate" id="validated_date">Date</label>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="mt-4">Encoded by:</h6>
            <div class="form-row">
                <div class="income-table">
                    <div class="income-header">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="income-row">
                        <div>
                            <label class="signature-box"><input type="file" class="file-input" name="encodedname" id="encoded_name"></label>
                            <label for="encoded_name">Signature over printed name</label>
                        </div>
                        <div>
                            <label class="signature-box"><input type="file" class="file-input" name="encodeddesignation" id="encoded_designation"></label>  
                            <label for="econded_designation">Designation</label>
                        </div>
                        <div>
                        <label><input type="date" name="encodeddate" id="encoded_date">Date</label>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="mt-4">Conformed by:</h6>
            <div class="form-row">
                <div class="income-table">
                    <div class="income-header">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="income-row">
                        <div>
                            <label class="signature-box"><input type="file" class="file-input" name="conformedname" id="conformed_name"></label>
                            <label for="conformed_name">Name of Applicant</label>
                        </div>
                        <div>
                            <label class="signature-box"><input type="file" class="file-input" name="conformedsignature" id="conformed_signature"></label>
                            <label for="conformed_signature">Signature</label>  
                        </div>
                        <div>
                        <label><input type="date" name="conformed_date" id="conformed_date">Date</label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
