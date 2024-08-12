@extends('layouts.admin')

@section('title', 'Search Beneficiaries')

@section('content')
    <style>
        .container {
            max-width: 768px;
            margin-left: 300px;
            padding: 1rem;
        }

        .card {
            width: 100%;
            max-width: 500px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: #1C4CB1;
            border: none;
            font-size: 1.2rem;
            padding: 0.75rem;
        }

        .btn-primary:hover {
            background-color: #163a8c;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo-container img {
            max-width: 150px;
        }

        .form-label {
            font-size: 1.1rem;
        }

        .form-control {
            font-size: 1.1rem;
            padding: 0.75rem;
        }

        .form-check-label {
            font-size: 1rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1C4CB1;
            color: white;
            padding: 1rem;
            border-radius: 15px 15px 0 0;
        }

        .header img {
            max-height: 50px;
        }

        .header h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        @media (min-width: 768px) {
            .card {
                max-width: 600px;
            }

            .btn-primary {
                font-size: 1.5rem;
                padding: 1rem;
            }

            .card-title {
                font-size: 2rem;
            }

            .form-label,
            .form-control {
                font-size: 1.3rem;
                padding: 1rem;
            }

            .form-check-label {
                font-size: 1.2rem;
            }
        }

        .container {
            max-width: 768px;
            margin-left: 300px;
            padding: 1rem;
        }

        .form-wrapper {
            display: flex;
            flex-direction: column;
        }

        .section {
            border: 1px solid #ccc;
            padding: 1rem;
            margin-bottom: 1rem;
            background: #f9f9f9;
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

        .section-summary {
            background: #e0e0e0;
            padding: 0.5rem;
            text-align: center;
            margin-top: 1rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 0.5rem;
        }

        input[type="text"] {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .radio-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .radio-group1 {
            display: flex;
            flex-direction: column;
        }

        .radio-group2 {
            align-items: center;

        }

        .radio-group2 label {
            margin-left: 5px;
        }

        .radio-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .radio-item label {
            margin-left: 5px;
        }

        .sub-section {
            margin-top: 1rem;
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

        .signature-box {
            border: 1px solid #ccc;
            padding: 0.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
            width: 100%;
        }

        .signature-box input[type="file"] {
            width: 100%;
            height: 100%;
            opacity: 0;
            position: absolute;
        }

        .certification .signatures .signature-box {
            position: relative;
        }

        .save-button {
            background-color: #1C4CB1;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            font-size: 1.1rem;
        }

        .save-button:hover {
            background-color: #163a8c;
        }
    </style>

    <div class="container">
        <div class="form-wrapper">

            @csrf
            <div class="form-section">
                <!-- Section 1 -->
                <div class="section">
                    <div class="section-header">
                        <div class="profile-pic"></div>
                        <div class="profile-info">
                            <h2></h2>
                            <div class="profile-details">
                                <div>
                                    <p>Senior ID: </p>
                                    <p>Date issued: </p>
                                </div>
                                <div>
                                    <p>Reference Code: </p>
                                    <p>Status: <span class="status"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-summary">
                        <p>Summary of Stipend</p>
                    </div>
                </div>

                <!-- Section 2 -->
                <div class="section">
                    <h3>I. Identification</h3>
                    <div class="section">
                        <h4>1. Name of Pensioner/Senior Citizen</h4>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="lastName" type="text" value="" placeholder="Last Name" />
                            <label>First Name</label>
                            <input name="firstName" type="text" value="" placeholder="First Name" />
                            <label>Middle Name</label>
                            <input name="middleName" type="text" value="" placeholder="Middle Name" />
                            <label>Name Extension</label>
                            <input name="extName" type="text" value="" placeholder="Name Extension" />
                        </div>
                    </div>
                    <div class="section">
                        <h4>2. Mother's Maiden Name</h4>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="lastName" type="text" value="" placeholder="Last Name" />
                            <label>First Name</label>
                            <input name="firstName" type="text" value="" placeholder="First Name" />
                            <label>Middle Name</label>
                            <input name="middleName" type="text" value="" placeholder="Middle Name" />
                            <label>Name Extension</label>
                            <input name="extName" type="text" value="" placeholder="Name Extension" />
                        </div>
                    </div>
                    <div class="section">
                        <h4>3. Names of Authorized Representatives</h4>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="lastName" type="text" value="" placeholder="Last Name" />
                            <label>First Name</label>
                            <input name="firstName" type="text" value="" placeholder="First Name" />
                            <label>Middle Name</label>
                            <input name="middleName" type="text" value="" placeholder="Middle Name" />
                            <label>Name Extension</label>
                            <input name="extName" type="text" value="" placeholder="Name Extension" />
                        </div>
                    </div>
                    <div class="section">
                        <h4>4. Place of Birth</h4>
                        <div class="form-group">
                            <label>Region</label>
                            <input name="Region" type="text" value="" placeholder="Region" />
                            <label>Province</label>
                            <input name="Province" type="text" value="" placeholder="Province" />
                            <label>City/Municipality</label>
                            <input name="cityMunicipality" type="text" value="" placeholder="City/Municipality" />
                            <label>Barangay</label>
                            <input name="Barangay" type="text" value="" placeholder="Barangay" />
                        </div>
                    </div>
                    <div class="section">
                        <h4>5. Address</h4>
                        <div class="form-group">
                            <label>Region</label>
                            <input name="Region" type="text" value="" placeholder="Region" />
                            <label>Province</label>
                            <input name="Province" type="text" value="" placeholder="Province" />
                            <label>City/Municipality</label>
                            <input name="cityMunicipality" type="text" value="" placeholder="City/Municipality" />
                            <label>Barangay</label>
                            <input name="Barangay" type="text" value="" placeholder="Barangay" />
                            <label>House No./Zone/Purok/Sitio</label>
                            <input name="houseNum" type="text" value=""
                                placeholder="House No./Zone/Purok/Sitio" />
                            <label>Street</label>
                            <input name="Street" type="text" value="" placeholder="Street" />
                        </div>
                    </div>
                    <div class="section">
                        <h4>6. Date of Birth</h4>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input name="dateBirth" type="date" value="" />
                        </div>
                    </div>
                    <div class="section">
                        <h4>7. Name of Guardian/Care Giver</h4>
                        <div class="form-group">
                            <label>Name of Guardian/Care Giver</label>
                            <input name="careName" type="text" value=""
                                placeholder="Name of Guardian/Care Giver" />
                        </div>
                    </div>
                    <div class="section">
                        <h4>8. Relationship of (7) to the Senior Citizen</h4>
                        <div class="form-group">
                            <label>Relationship of (7) to the Senior Citizen</label>
                            <input name="relSenior" type="text" value=""
                                placeholder="Relationship of (7) to the Senior Citizen" />
                        </div>
                    </div>
                    <div class="section">
                        <h4>9. Marital Status</h4>
                        <div class="form-group">
                            <label>Marital Status</label>
                            <div class="radio-group2">
                                <input name="maritalStatus" type="radio" id="single" value="Single" />
                                <label for="single">Single</label>
                                <br />
                                <input name="maritalStatus" type="radio" id="marrid" value="Married" />
                                <label for="married">Married</label>
                                <br />
                                <input name="maritalStatus" type="radio" id="widowed" value="Widowed" />
                                <label for="widowed">Widowed</label>
                                <br />
                                <input name="maritalStatus" type="radio" id="separated" value="Separated" />
                                <label for="separated">Separated</label>
                                <br />
                                <input name="maritalStatus" type="radio" id="livein" value="Live-In" />
                                <label for="livein">Live-In</label>
                                <br />
                                <input name="maritalStatus" type="radio" id="others" value="Others" />
                                <label for="others">Others:</label>
                                <input name="maritalStatus" type="text" value="" placeholder="Others" />
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h4>10. Sex</h4>
                        <div class="form-group">
                            <div class="radio-group">
                                <input name="sex" type="radio" id="male" value="Male" />
                                <label for="male">Male</label>
                                <input name="sex" type="radio" id="female" value="Female" />
                                <label for="female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h4>11. Contact Number</h4>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input name="contactNumber" type="text" value="" placeholder="Contact Number" />
                        </div>
                    </div>
                    <div class="section">
                        <h4>12. Household Size</h4>
                        <div class="form-group">
                            <label>Household Size</label>
                            <input name="householdSize" type="text" value="" placeholder="Household Size" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3 -->

            <div class="section">
                <h3>II. Socioeconomic Information</h3>
                <div class="section">
                    <h4>A. Income Sources and Financial Support</h4>
                    <div class="form-group">
                        <label>Do you receive any form of pension?</label>
                        <div class="radio-group">
                            <input name="receivePension" type="radio" id="yes" value="Yes" />
                            <label for="yes">Yes</label>
                            <input name="receivePension" type="radio" id="no" value="No" />
                            <label for="no">No</label>
                            <input name="receivePension" type="radio" id="dontknow" value="Don't know" />
                            <label for="dontknow">Don't know</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>What pension/s did you receive in the past 6 months?</label>
                        <div class="radio-group">
                            <input name="pastPension" type="radio" id="dswd" value="DSWD Social Pension" />
                            <label for="dswd">DSWD Social Pension</label>
                            <input name="pastPension" type="radio" id="gsis" value="GSIS" />
                            <label for="gsis">GSIS</label>
                            <input name="pastPension" type="radio" id="sss" value="SSS" />
                            <label for="sss">SSS</label>
                            <input name="pastPension" type="radio" id="afpsla" value="AFPSLA" />
                            <label for="afpsla">AFPSLA</label>
                            <label for="others">Others:</label>
                            <input name="pastPension" type="text" value="" placeholder="Others" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>What are your sources of income and financial support in the past 6 months (other than your
                            pension/s)?</label>
                        <div class="income-table">
                            <div class="income-header">
                                <div>A. Sources</div>
                                <div>B. Is it regular?</div>
                                <div>C. Income</div>
                            </div>
                            <div class="income-row">
                                <div><input name="incomeSources" type="checkbox" id="wages"
                                        value="Wages/Salaries" />
                                    <label for="wages">1. Wages/Salaries</label>
                                </div>
                                <div><input type="checkbox" id="wageRegular_yes" name="wageRegular" />
                                    <label for="wages">Yes</label>
                                    <input type="checkbox" id="wageRegular_no" name="wageRegular" />
                                    <label for="wages">No</label>
                                </div>
                                <div><input type="text" id="wageIncome" name="wageIncome"
                                        placeholder="Enter amount" /></div>
                            </div>
                            <div class="income-row">
                                <div><input name="incomeSources" type="checkbox" id="profit"
                                        value="Profits from Entrepreneurial Activities" />
                                    <label for="profit">2. Profits from Entrepreneurial Activities</label>
                                </div>
                                <div><input type="checkbox" id="profitRegular_yes" name="profitRegular" />
                                    <label for="profit">Yes</label>
                                    <input type="checkbox" id="profitRegular_no" name="profitRegular" />
                                    <label for="profit">No</label>
                                </div>
                                <div><input type="text" id="profitIncome" name="profitIncome"
                                        placeholder="Enter amount" /></div>
                            </div>
                            <div class="income-row">
                                <div><input name="incomeSources" type="checkbox" id="household"
                                        value="Household Family Members/Relatives" />
                                    <label for="household">3. Household Family Members/Relatives</label>
                                </div>
                                <div><input type="checkbox" id="householdRegular_yes" name="householdRegular" />
                                    <label for="household">Yes</label>
                                    <input type="checkbox" id="householdRegular_no" name="householdRegular" />
                                    <label for="household">No</label>
                                </div>
                                <div><input type="text" id="householdIncome" name="householdIncome"
                                        placeholder="Enter amount" /></div>
                            </div>
                            <div class="income-row">
                                <div><input name="incomeSources" type="checkbox" id="domestic"
                                        value="Domestic Family Members/Relatives" />
                                    <label for="domestic">4. Domestic Family Members/Relatives</label>
                                </div>
                                <div><input type="checkbox" id="domesticRegular_yes" name="domesticRegular" />
                                    <label for="domestic">Yes</label>
                                    <input type="checkbox" id="domesticRegular_no" name="domesticRegular" />
                                    <label for="domestic">No</label>
                                </div>
                                <div><input type="text" id="domesticIncome" name="domesticIncome"
                                        placeholder="Enter amount" /></div>
                            </div>
                            <div class="income-row">
                                <div>
                                    <input name="incomeSources" type="checkbox" id="international"
                                        value="International Family Members/Relatives" />
                                    <label for="international">5. International Family Members/Relatives</label>
                                </div>
                                <div><input type="checkbox" id="internationalRegular_yes" name="internationalRegular" />
                                    <label for="international">Yes</label>
                                    <input type="checkbox" id="internationalRegular_no" name="internationalRegular" />
                                    <label for="international">No</label>
                                </div>
                                <div><input type="text" id="internationalIncome" name="internationalIncome"
                                        placeholder="Enter amount" /></div>
                            </div>
                            <div class="income-row">
                                <div><input name="incomeSources" type="checkbox" id="friends"
                                        value="Friends/Neighbors" />
                                    <label for="friends">6. Friends/Neighbors</label>
                                </div>
                                <div><input type="checkbox" id="friendsRegular_yes" name="friendsRegular" />
                                    <label for="friends">Yes</label>
                                    <input type="checkbox" id="friendsRegular_no" name="friendsRegular" />
                                    <label for="friends">No</label>
                                </div>
                                <div><input type="text" id="friendsIncome" name="friendsIncome"
                                        placeholder="Enter amount" /></div>
                            </div>
                            <div class="income-row">
                                <div><input name="incomeSources" type="checkbox" id="transfer"
                                        value="Transfers from the Government" />
                                    <label for="transfer">7. Transfers from the Government</label>
                                </div>
                                <div><input type="checkbox" id="transferRegular_yes" name="transferRegular" />
                                    <label for="transfer">Yes</label>
                                    <input type="checkbox" id="transferRegular_no" name="transferRegular" />
                                    <label for="transfer">No</label>
                                </div>
                                <div><input type="text" id="transferIncome" name="transferIncome"
                                        placeholder="Enter amount" /></div>
                            </div>
                            <div class="income-row">
                                <div>
                                    <label for="otherSources">8. Others:</label>
                                    <input name="pastPension" type="text" id="otherSources" placeholder="Others" />
                                </div>
                                <div><input type="checkbox" id="otherRegular_yes" name="otherRegular" />
                                    <label for="other">Yes</label>
                                    <input type="checkbox" id="otherRegular_no" name="otherRegular" />
                                    <label for="other">No</label>
                                </div>
                                <div><input type="text" id="otherIncome" name="otherIncome"
                                        placeholder="Enter amount" /></div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Section 4 -->

                <h3>III. Utilization of Social Pension</h3>
                <div class="section">
                    <h4>A. Utilization of Social Pension</h4>
                    <div class="form-group">
                        <label>Where do you spend your Social Pension?</label>
                        <div class="radio-group2">
                            <input name="spendPension" type="radio" id="food" value="Food" />
                            <label for="food">Food</label>
                            <br />
                            <input name="spendPension" type="radio" id="medicines" value="Medicines and Vitamins" />
                            <label for="medicines">Medicines and Vitamins</label>
                            <br />
                            <input name="spendPension" type="radio" id="checkup"
                                value="Health check-up and other hospital/medical servies" />
                            <label for="checkup">Health check-up and other hospital/medical servies</label>
                            <br />
                            <input name="spendPension" type="radio" id="clothing" value="Clothing" />
                            <label for="clothing">Clothing</label>
                            <br />
                            <input name="spendPension" type="radio" id="utilities" value="Utilities" />
                            <label for="utilities">Utilities (e.g. electric and water bills)</label>
                            <br />
                            <input name="spendPension" type="radio" id="debtpayment" value="Debt payment" />
                            <label for="debtpayment">Debt payment</label>
                            <br />
                            <input name="spendPension" type="radio" id="livelihood" value="Livelihood" />
                            <label for="livelihood">Livelihood</label>
                            <br />
                            <label for="others">Others</label>
                            <select class="form-select" id="others" name="Others" required>
                                <option value="">Choose</option>
                                <option value="PANTAWID">PANTAWID</option>
                                <option value="NON-PANTAWID">NON-PANTAWID</option>
                                <option value="IP">IP</option>
                                <option value="NON-IP">NON-IP</option>
                            </select>
                            <br />
                            <label for="spectribe">Specify Tribe</label>
                            <input name="specTribe" type="text" value="" placeholder="Specify Tribe" />
                        </div>
                    </div>
                </div>
                <div class="section">
                    <h4>B. Health and Social Condition</h4>
                    <div class="form-group">
                        <label>Who are you living with?</label>
                        <div class="radio-group">
                            <input name="livingWith" type="radio" id="livingalone" value="Living alone" />
                            <label for="livingalone">Living alone</label>
                            <input name="livingWith" type="radio" id="livingwithspouse"
                                value="Living with spouse only" />
                            <label for="livingwithspouse">Living with spouse only</label>
                            <input name="livingWith" type="radio" id="livingwithchild" value="Living with a child" />
                            <label for="livingwithchild">Living with a child</label>
                            <input name="livingWith" type="radio" id="livingwithrelative"
                                value="Living with another relative" />
                            <label for="livingwithrelative">Living with another relative</label>
                            <input name="livingWith" type="radio" id="livingwithunrelated"
                                value="Living with unrelated people" />
                            <label for="livingwithunrelated">Living with unrelated people</label>
                        </div>
                        <div class="form-group">
                            <label>Are you older than 85 years?</label>
                            <div class="radio-group">
                                <input name="olderThan85" type="radio" id="older_yes" value="Yes" />
                                <label for="older_yes">Yes</label>
                                <input name="olderThan85" type="radio" id="older_no" value="No" />
                                <label for="older_no">No</label>
                            </div>
                            <div class="form-group">
                                <label>In general, do you have any health problems that require you to limit your
                                    activities?</label>
                                <div class="radio-group">
                                    <input name="healthProblem" type="radio" id="health_yes" value="Yes" />
                                    <label for="health_yes">Yes</label>
                                    <input name="healthProblem" type="radio" id="health_no" value="No" />
                                    <label for="health_no">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Do you need someone to help you in a regular basis?</label>
                                <div class="radio-group">
                                    <input name="regularHelp" type="radio" id="help_yes" value="Yes" />
                                    <label for="help_yes">Yes</label>
                                    <input name="regularHelp" type="radio" id="help_no" value="No" />
                                    <label for="help_no">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>In general, do you have any health problems that require you to stay at home</label>
                                <div class="radio-group">
                                    <input name="stayHome" type="radio" id="home_yes" value="Yes" />
                                    <label for="home_yes">Yes</label>
                                    <input name="stayHome" type="radio" id="home_no" value="No" />
                                    <label for="home_no">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>If you need help, can you count on someone close to you?</label>
                                <div class="radio-group">
                                    <input name="closeHelp" type="radio" id="close_yes" value="Yes" />
                                    <label for="close_yes">Yes</label>
                                    <input name="closeHelp" type="radio" id="close_no" value="No" />
                                    <label for="close_no">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Do you regularly use a stick/walker/wheelchair to move about?</label>
                                <div class="radio-group">
                                    <input name="swwMove" type="radio" id="move_yes" value="Yes" />
                                    <label for="move_yes">Yes</label>
                                    <input name="swwMove" type="radio" id="move_no" value="No" />
                                    <label for="move_no">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Do you have any disability?</label>
                                <div class="radio-group">
                                    <label for="disability_yes">Yes</label>
                                    <select class="form-select" id="disability" name="disability_yes" required>
                                        <option value="">Choose</option>
                                        <option value="Communication disability">Communication disability</option>
                                        <option value="Disability due to chronic illness">Disability due to chronic illness
                                        </option>
                                        <option value="Learning disability">Learning disability</option>
                                        <option value="Intellectual disability">Intellectual disability</option>
                                        <option value="Orthopedic disability">Orthopedic disability</option>
                                        <option value="Mental?psychological disability">Mental?psychological disability
                                        </option>
                                        <option value="Visual disability">Visual disability</option>
                                    </select>
                                    <input name="Disability" type="radio" id="disability_no" value="No" />
                                    <label for="disability_no">None</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Do you have any critical illness or diseases?</label>
                                <div class="radio-group">
                                    <input name="critDisease" type="radio" id="critdisease_yes" value="Yes" />
                                    <label for="critdisease_yes">Yes</label>
                                    <input name="critDisease" type="text" value="" placeholder="Disability" />
                                    <input name="swwMove" type="radio" id="critdisease_no" value="No" />
                                    <label for="critdisease_no">No</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>On the average, how many meals did you have in a day during the past week?</label>
                                <div class="radio-group">
                                    <input name="mealsaDay" type="radio" id="mealsaday_one" value="One" />
                                    <label for="mealsaday_one">At most one</label>
                                    <input name="mealsaDay" type="radio" id="mealsaday_two" value="Two" />
                                    <label for="mealsaday_two">Two</label>
                                    <label for="mealsaday_three"><input type="radio" name="mealsaDay"
                                            id="mealsaday_three" value="Three"> At least three</label>
                                </div>
                            </div>
                            <div class="form-wrapper">

                                <section class="form-group">
                                    <h2>IV. Declaration</h2>
                                    <p>On behalf of all the members of my household, I confirm that the information I have
                                        provided in this paper is true and represent accurate information of our household.
                                    </p>
                                    <p>I understand that the data collected from this validation will be processed, managed
                                        and maintained in a secure database by the Department of Social Welfare and
                                        Development (DSWD). Such data will be used to determine poverty status, serve as
                                        basis for research, and in the development and implementation of social protection
                                        programs and services to promote the interest of the poor.</p>
                                    <p>I authorize DSWD to manage the information, including personal data obtained from the
                                        household validation activity and allow the processing and controlled disclosure or
                                        transfer of data to its development partners and other stakeholders in accordance
                                        with the DSWD policies on data sharing and the provisions of Republic Act NO. 10173
                                        or the Data Privacy Act (DPA) of 2012</p>
                                    <div class="signatures">
                                        <div>
                                            <label>Name of Respondent</label>
                                            <div class="signature-box">
                                                <input type="file">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Signature of Respondent</label>
                                            <div class="signature-box">
                                                <input type="file">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Thumbmark of Respondent</label>
                                            <div class="signature-box">
                                                <input type="file">
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="certification">
                                    <h2>V. Certification</h2>
                                    <p>As Validator hired by DSWD for the purpose of this activity, I confirm that for this
                                        household the data.</p>
                                    <p>I attest that the information provided in this form was personally obtained and
                                        reviewed by me.</p>
                                    <p>I further declare that all household information collected and validated was managed
                                        with strict confidentiality and protected from unlawful and unauthorized processing.
                                    </p>
                                    <p>I am aware that any violation committed on the foregoing will be penalized in
                                        accordance with pertinent provision of RA 10173 of the Data Privacy Act of 2012</p>
                                    <div class="signatures">
                                        <div>
                                            <label>Signature over Printed name of Validator</label>
                                            <div class="signature-box">
                                                <input type="file">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Date Accomplished</label>
                                            <div class="signature-box">
                                                <input type="file">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Encoders ID and Signature</label>
                                            <div class="signature-box">
                                                <input type="file">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Date Encoded</label>
                                            <div class="signature-box">
                                                <input type="file">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Time Encoded</label>
                                            <div class="signature-box">
                                                <input type="file">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Image of Registration Form</label>
                                            <div class="signature-box">
                                                <input type="file">
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="eligibility">
                                    <h2>Eligibility</h2>
                                    <div class="eligibility-options">
                                        <label><input type="radio" name="eligibility" value="eligible">
                                            Eligible</label>
                                        <label><input type="radio" name="eligibility" value="non-eligible">
                                            Non-Eligible</label>
                                    </div>
                                    <div class="remarks">
                                        <label>Remarks</label>
                                        <textarea rows="4" cols="50"></textarea>
                                    </div>
                                    <button class="save-button">Save Changes</button>
                                </section>
                            </div>
                        </div>


                        <!-- jQuery and Bootstrap JS -->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        @livewireScripts
                    </div>
                </div>
                </form>

            </div>


        @endsection
