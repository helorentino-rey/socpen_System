@extends('layouts.superadmin')

@section('title', 'Add Beneficiary')

@section('content')
    {{-- @include('layouts.beneficiary') --}}



    <body>
        <h2>ANNEX 2</h2>
        <h3>SOCIAL PENSION VALIDATION FORM</h3>
        <h4>SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS</h4>


        <form>
            <label for="province">Province:</label>
            <input type="text" id="province" name="province"><br><br>

            <label for="city">City / Municipality:</label>
            <input type="text" id="city" name="city"><br><br>

            <label for="osca_id">OSCA ID No.:</label>
            <input type="text" id="osca_id" name="osca_id"><br><br>

            <label for="ncsc_rrn">NCSC RRN: (If Applicable)</label>
            <input type="text" id="ncsc_rrn" name="ncsc_rrn"><br><br>

            <h4>IDENTIFYING INFORMATION (Pagkilala ng Impormasyon)</h4>
            <label for="last_name">Last Name (Apelyido):</label>
            <input type="text" id="last_name" name="last_name">
            <label for="first_name">First Name (Unang Pangalan):</label>
            <input type="text" id="first_name" name="first_name">
            <label for="middle_name">Middle Name (Gitnang Pangalan):</label>
            <input type="text" id="middle_name" name="middle_name">
            <label for="ext">Ext. (III, Jr.):</label>
            <input type="text" id="ext" name="ext"><br><br>

            <label for="mother_maiden_name">MOTHER’S MAIDEN NAME (Pangalan ng ina sa pagkadalaga):</label><br>
            <label for="mother_last_name">Last Name (Apelyido):</label>
            <input type="text" id="mother_last_name" name="mother_last_name">
            <label for="mother_first_name">First Name (Unang Pangalan):</label>
            <input type="text" id="mother_first_name" name="mother_first_name">
            <label for="mother_middle_name">Middle Name (Gitnang Pangalan):</label>
            <input type="text" id="mother_middle_name" name="mother_middle_name"><br><br>

            <label for="permanent_address">PERMANENT ADDRESS (Permanenteng Tirahan):</label><br>
            <input type="text" id="permanent_address" name="permanent_address"><br><br>

            <label for="present_address">PRESENT ADDRESS (Kasalukuyang Tirahan):</label><br>
            <input type="text" id="present_address" name="present_address"><br><br>

            <label for="dob">DATE OF BIRTH (Araw ng Kapanganakan):</label><br>
            <label for="dob_month">Month (Buwan):</label>
            <input type="text" id="dob_month" name="dob_month">
            <label for="dob_date">Date (Araw):</label>
            <input type="text" id="dob_date" name="dob_date">
            <label for="dob_year">Year (Taon):</label>
            <input type="text" id="dob_year" name="dob_year"><br><br>

            <label for="pob">PLACE OF BIRTH (Lugar ng Kapanganakan):</label><br>
            <label for="pob_city">City/Municipality (Lungsod):</label>
            <input type="text" id="pob_city" name="pob_city">
            <label for="pob_province">Province (Lalawigan):</label>
            <input type="text" id="pob_province" name="pob_province"><br><br>

            <label for="age">AGE (Edad):</label>
            <input type="text" id="age" name="age"><br><br>

            <label for="sex">SEX (Kasarian):</label>
            <input type="text" id="sex" name="sex"><br><br>

            <label for="civil_status">CIVIL STATUS (Katayuang Sibil):</label>
            <input type="text" id="civil_status" name="civil_status"><br><br>

            <h4>AFFILIATION (Pagkakaugnay)</h4>
            <label for="listahanan">Listahanan:</label>
            <input type="text" id="listahanan" name="listahanan"><br><br>

            <label for="pantawid">Pantawid Beneficiary (Benepisyaryo ng 4Ps):</label>
            <input type="text" id="pantawid" name="pantawid"><br><br>

            <label for="indigenous">Indigenous People (Mga Katutubo):</label>
            <input type="text" id="indigenous" name="indigenous"><br><br>

            <h4>FAMILY INFORMATION (Impormasyon ng Pamilya)</h4>
            <label for="spouse_last_name">NAME OF SPOUSE (Pangalan ng Asawa):</label><br>
            <label for="spouse_last_name">Last Name (Apelyido):</label>
            <input type="text" id="spouse_last_name" name="spouse_last_name">
            <label for="spouse_first_name">First Name (Unang Pangalan):</label>
            <input type="text" id="spouse_first_name" name="spouse_first_name">
            <label for="spouse_middle_name">Middle Name (Gitnang Pangalan):</label>
            <input type="text" id="spouse_middle_name" name="spouse_middle_name">
            <label for="spouse_ext">Ext. (III, Jr.):</label>
            <input type="text" id="spouse_ext" name="spouse_ext"><br><br>

            <label for="spouse_address">ADDRESS (Tirahan):</label>
            <input type="text" id="spouse_address" name="spouse_address"><br><br>

            <label for="spouse_contact">CONTACT NUMBER (Numero ng telepono):</label>
            <input type="text" id="spouse_contact" name="spouse_contact"><br><br>

            <h4>CHILDREN (Mga Anak):</h4>
            <label for="children_name">NAME (Pangalan):</label>
            <input type="text" id="children_name" name="children_name"><br><br>

            <label for="children_civil_status">CIVIL STATUS (Katayuang Sibil):</label>
            <input type="text" id="children_civil_status" name="children_civil_status"><br><br>

            <label for="children_occupation">OCCUPATION (Trabaho):</label>
            <input type="text" id="children_occupation" name="children_occupation"><br><br>

            <label for="children_income">INCOME (Kita o Sahod):</label>
            <input type="text" id="children_income" name="children_income"><br><br>

            <label for="children_contact">CONTACT NUMBER (Numero ng Telepono):</label>
            <input type="text" id="children_contact" name="children_contact"><br><br>

            <h4>NAME OF AUTHORIZED REPRESENTATIVES:</h4>
            <label for="rep_name">NAME (Pangalan):</label>
            <input type="text" id="rep_name" name="rep_name"><br><br>

            <label for="rep_civil_status">CIVIL STATUS (Katayuang Sibil):</label>
            <input type="text" id="rep_civil_status" name="rep_civil_status"><br><br>

            <label for="rep_contact">CONTACT NUMBER (Numero ng Telepono):</label>
            <input type="text" id="rep_contact" name="rep_contact"><br><br>

            <h4>NAME OF CAREGIVER (Pangalan ng Tagapag-alaga):</h4>
            <label for="caregiver_last_name">Last Name (Apelyido):</label>
            <input type="text" id="caregiver_last_name" name="caregiver_last_name">
            <label for="caregiver_first_name">First Name (Unang Pangalan):</label>
            <input type="text" id="caregiver_first_name" name="caregiver_first_name">
            <label for="caregiver_middle_name">Middle Name (Gitnang Pangalan):</label>
            <input type="text" id="caregiver_middle_name" name="caregiver_middle_name">
            <label for="caregiver_ext">Ext. (III, Jr.):</label>
            <input type="text" id="caregiver_ext" name="caregiver_ext"><br><br>

            <label for="caregiver_relationship">RELATIONSHIP (Relasyon sa Benepisyaryo):</label>
            <input type="text" id="caregiver_relationship" name="caregiver_relationship"><br><br>

            <label for="caregiver_contact">CONTACT NUMBER (Numero ng telepono):</label>
            <input type="text" id="caregiver_contact" name="caregiver_contact"><br><br>

            <h4>LIVING ARRANGEMENT (Kaayusan sa Pamumuhay):</h4>
            <label for="living_arrangement">Owned (Pag-aari):</label>
            <input type="checkbox" id="living_arrangement_owned" name="living_arrangement" value="Owned">
            <label for="living_arrangement">Living Alone (Namumuhay mag-isa):</label>
            <input type="checkbox" id="living_arrangement_alone" name="living_arrangement" value="Living Alone">
            <label for="living_arrangement">Rent (Nangungupahan):</label>
            <input type="checkbox" id="living_arrangement_rent" name="living_arrangement" value="Rent">
            <label for="living_arrangement">Living with spouse (Namumuhay kasama ang asawa):</label>
            <input type="checkbox" id="living_arrangement_spouse" name="living_arrangement" value="Living with spouse">
            <label for="living_arrangement">Living with children (Namumuhay kasama ang mga anak):</label>
            <input type="checkbox" id="living_arrangement_children" name="living_arrangement"
                value="Living with children">
            <label for="living_arrangement">Others (Iba pa):</label>
            <input type="text" id="living_arrangement_others" name="living_arrangement_others"><br><br>

            <h4>ECONOMIC INFORMATION (Impormasyong Pang-ekonomiya)</h4>
            <label for="receiving_pension">RECEIVING PENSION (Tumatanggap ng pension):</label>
            <input type="radio" id="receiving_pension_yes" name="receiving_pension" value="Yes">
            <label for="receiving_pension_yes">Yes (Oo)</label>
            <input type="radio" id="receiving_pension_no" name="receiving_pension" value="No">
            <label for="receiving_pension_no">No (Wala)</label><br>
            <label for="pension_amount">How much (Magkano):</label>
            <input type="text" id="pension_amount" name="pension_amount">
            <label for="pension_source">Source (Mula saan):</label>
            <input type="text" id="pension_source" name="pension_source"><br><br>

            <label for="permanent_income">PERMANENT INCOME (Permanenteng Kita):</label>
            <input type="radio" id="permanent_income_yes" name="permanent_income" value="Yes">
            <label for="permanent_income_yes">Yes (Oo)</label>
            <input type="radio" id="permanent_income_no" name="permanent_income" value="No">
            <label for="permanent_income_no">None (Wala)</label><br>
            <label for="income_amount">How much (Magkano):</label>
            <input type="text" id="income_amount" name="income_amount">
            <label for="income_source">Source (Mula saan):</label>
            <input type="text" id="income_source" name="income_source"><br><br>

            <label for="regular_support">REGULAR SUPPORT (Regular na Suporta):</label>
            <input type="radio" id="regular_support_yes" name="regular_support" value="Yes">
            <label for="regular_support_yes">Yes (Oo)</label>
            <input type="radio" id="regular_support_no" name="regular_support" value="No">
            <label for="regular_support_no">None (Wala)</label><br>
            <label for="support_amount">How much (Magkano):</label>
            <input type="text" id="support_amount" name="support_amount">
            <label for="support_source">Source (Mula saan):</label>
            <input type="text" id="support_source" name="support_source"><br><br>

            <h4>HEALTH INFORMATION (Impormasyon sa Kalusugan)</h4>
            <label for="existing_illness">WITH EXISTING ILLNESS (May karamdaman):</label>
            <input type="radio" id="existing_illness_yes" name="existing_illness" value="Yes">
            <label for="existing_illness_yes">Yes (Oo)</label>
            <input type="radio" id="existing_illness_no" name="existing_illness" value="No">
            <label for="existing_illness_no">None (Wala)</label><br>
            <label for="illness_specify">Specify (Itala):</label>
            <input type="text" id="illness_specify" name="illness_specify"><br><br>

            <label for="disability">WITH DISABILITY (May kapansanan):</label>
            <input type="radio" id="disability_yes" name="disability" value="Yes">
            <label for="disability_yes">Yes (Oo)</label>
            <input type="radio" id="disability_no" name="disability" value="No">
            <label for="disability_no">None (Wala)</label><br>
            <label for="disability_specify">Specify (Itala):</label>
            <input type="text" id="disability_specify" name="disability_specify"><br><br>

            <h4>FRAILTY QUESTIONS:</h4>
            <label for="adls_difficulty">Do you experience difficulty in doing your ADLs? (Nahihirapan ka ba sa iyong
                pang-araw araw na gawain?)</label>
            <input type="radio" id="adls_difficulty_yes" name="adls_difficulty" value="Yes">
            <label for="adls_difficulty_yes">Yes (Oo)</label>
            <input type="radio" id="adls_difficulty_no" name="adls_difficulty" value="No">
            <label for="adls_difficulty_no">No (Hindi)</label><br><br>

            <label for="iadls_dependence">Are you completely dependent on someone in doing your IADLs? (Ganap ka bang
                umaasa sa ibang tao sa pagsasagawa ng iyong gawaing pamumuhay?)</label>
            <input type="radio" id="iadls_dependence_yes" name="iadls_dependence" value="Yes">
            <label for="iadls_dependence_yes">Yes (Oo)</label>
            <input type="radio" id="iadls_dependence_no" name="iadls_dependence" value="No">
            <label for="iadls_dependence_no">No (Hindi)</label><br><br>

            <label for="weight_loss">Are you experiencing weight loss, weakness, exhaustion? (Ikaw ba ay nakakaranas ng
                pagkabawas ng timbang, kahinaan o pagkapagod?)</label>
            <input type="radio" id="weight_loss_yes" name="weight_loss" value="Yes">
            <label for="weight_loss_yes">Yes (Oo)</label>
            <input type="radio" id="weight_loss_no" name="weight_loss" value="No">
            <label for="weight_loss_no">No (Hindi)</label><br><br>

            <h4>DO NOT WRITE BELOW THIS PART FOR DSWD’S USE ONLY (Huwag susulatan ang DSWD lamang ang pwedeng gumamit)</h4>
            <h4>ASSESSMENT (Pagtatasa)</h4>
            <textarea id="assessment" name="assessment" rows="4" cols="50"></textarea><br><br>

            <h4>RECOMMENDATION (Rekomendasyon)</h4>
            <label for="eligible">Eligible (Kwalipikado)</label>
            <input type="radio" id="eligible" name="recommendation" value="Eligible">
            <label for="not_eligible">Not Eligible (Hindi kwalipikado)</label>
            <input type="radio" id="not_eligible" name="recommendation" value="Not Eligible"><br><br>

            <label for="validated_by">Validated by:</label><br>
            <label for="validator_signature">Signature over Printed Name (Buong Pangalan at Lagda):</label>
            <input type="text" id="validator_signature" name="validator_signature"><br><br>

            <label for="validator_designation">Designation (Position):</label>
            <input type="text" id="validator_designation" name="validator_designation"><br><br>

            <label for="validation_date">Date (Petsa):</label>
            <input type="date" id="validation_date" name="validation_date"><br><br>

            <div class="form-group">
                <label for="encoded_by">Encoded by:</label>
                <input type="text" class="form-control" id="encoded_by" name="encoded_by"
                    placeholder="Signature over Printed Name (Buong Pangalan at Lagda)">
            </div>

            <div class="form-group">
                <label for="designation">Designation (Position):</label>
                <input type="text" class="form-control" id="designation" name="designation">
            </div>

            <div class="form-group">
                <label for="date_encoded">Date Encoded (Petsa):</label>
                <input type="date" class="form-control" id="date_encoded" name="date_encoded">
            </div>

            <p>By signing this form, I grant my free and voluntary consent for the Department of Social Welfare and
                Development (DSWD) to collect, process, and share my personal information for the purpose of validation,
                eligibility test, and cross-matching to serve as the basis in granting my entitlements as a qualified
                beneficiary of the Social Pension for Indigent Senior Citizens (SPISC) Program. As a data subject, I
                understand that I have the right to be informed, access, object, block, file complaints or damages or
                rectify my personal information obtained, processed, or shared as well as the purpose and reason for
                processing or sharing this personal information.</p>

            <p>Sa paglagda nito, binibigyan ko ang aking malaya at boluntaryong pahintulot sa Department of Social Welfare
                and Development (DSWD) na kolektahin, iproseso, at ibahagi ang aking personal na impormasyon para sa layunin
                ng validation, eligibility test, at cross-matching para magsilbing batayan sa pagbibigay ng aking mga
                karapatan bilang isang kwalipikadong benepisyaryo ng Social Pension for Indigent Senior Citizens (SPISC)
                Program. Bilang isang paksa ng datos, nauunawaan ko na may karapatan akong malaman, ma-access, tumanggi,
                harangan, maghain ng mga reklamo o pinsala o itama ang aking personal na impormasyong nakuha, naproseso, o
                ibinahagi pati na rin ang layunin at dahilan para sa pagproseso o pagbabahagi ng personal na impormasyon na
                ito.</p>

            <div class="form-group">
                <label for="conformed_by">Conformed by:</label>
                <input type="text" class="form-control" id="conformed_by" name="conformed_by"
                    placeholder="Name of Applicant or Respondent (Pangalan ng Aplikante)">
            </div>

            <div class="form-group">
                <label for="signature">Signature or Thumbmark (Lagda o Thumbmark):</label>
                <input type="text" class="form-control" id="signature" name="signature">
            </div>

            <div class="form-group">
                <label for="date">Date (Petsa):</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <h4>DATA PRIVACY</h4>
            <p>In compliance with the provisions of Republic Act No. 10173, also known as the Data Privacy Act of 2012 and
                its Implementing Rules and Regulations (IRR), the Department of Social Welfare and Development (DSWD)
                ensures that the personal information provided is collected and processed by authorized personnel and is
                only used for the implementation of the Social Pension for Indigent Senior Citizens (SPISC) Program as
                mandated under Republic Act No. 9994</p>

            <p>Bilang pagsunod sa mga probisyon ng Batas Republika 10173, na kilala rin bilang Data Privacy Act of 2012 at
                ang Implementing Rules and Regulations (IRR) nito, tinitiyak ng Department of Social Welfare and Development
                (DSWD) na ang personal na impormasyong ibinigay ay kinokolekta at pinoproseso ng awtorisadong mga tauhan at
                ginagamit lamang para sa pagpapatupad ng Social Pension for Indigent Senior Citizens (SPISC) Program ayon sa
                mandato sa ilalim ng Batas Republika 9994.</p>
        @endsection
