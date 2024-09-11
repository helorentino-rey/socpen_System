<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Pension Validation Form</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <style>
        /* General styles for layout */
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }

        @media print {
            .no-print {
                display: none;
            }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            margin-bottom: 10px;
        }

        .logos {
            display: flex;
            align-items: center;
        }

        .dswd-logo,
        .social-pension-logo,
        .bagong-pilipinas-logo {
            margin-right: 10px;
            object-fit: contain;
            vertical-align: middle;
        }

        .dswd-logo {
            height: 50px;
            margin-right: 10px;
            object-fit: contain;
        }

        .social-pension-logo {
            height: 70px;
            margin-right: 10px;
            object-fit: contain;
            margin-top: 5px;
        }

        .bagong-pilipinas-logo {
            height: 70px;
            margin-right: 10px;
            object-fit: contain;
            margin-top: 2px;
        }

        .header-text {
            font-size: 10px;
            text-align: right;
            line-height: 1;
            display: flex;
            align-items: center;
        }

        h5,
        h6 {
            margin: 0;
            padding: 0;
            font-weight: bold;
            text-align: center;
            font-size: 15px;
        }

        .row.align-items-center {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #333;
            padding: 4px;
            text-align: left;
        }

        .section-title {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
            text-transform: uppercase;
            font-size: 12px;
            border-bottom: 1px solid #333;
            padding-bottom: 3px;
        }

        .input-underline {
            border-bottom: 1px solid #000;
            width: 100%;
            display: inline-block;
            margin-top: -2px;
        }


        footer {
            position: fixed;
            bottom: -30px;
            /* Adjust position to move closer to the page bottom */
            left: 0;
            right: 0;
            height: 10px;
            /* Adjust height for footer content */
            text-align: center;
            font-size: 10px;
            padding: 5px 20px;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer-line {
            width: 100%;
            border-top: 1px solid #000;
            margin-bottom: 5px;
        }

        .footer-text {
            font-weight: bold;
            font-size: 12px;
        }

        .footer-address {
            font-size: 10px;
            text-align: center;
            margin-bottom: 5px;
        }

        .pagenum:before {
            content: counter(page);
        }

        .picture-frame {
            border: 1px solid #333;
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: auto;
            position: relative;
        }

        .picture-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .picture-frame span {
            font-size: 10px;
            position: absolute;
            color: #333;
            z-index: 1;
            display: block;
            text-align: center;
        }

        /* Styles for header and footer */
        @page {
            margin: 100px 25px;
            /* Top and bottom margins for the header and footer */
        }

        @page: first {
            margin-top: 20px;
            /* Adjust top margin for the first page to make space for the header */
        }

        .export-button {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .export-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }


        @media print {
            .no-print {
                display: none !important;
                /* Ensures the button is hidden in print view */
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logos">
            <img src="{{ public_path('img/DSWDColored.png') }}" alt="DSWD Logo" class="dswd-logo">
            <img src="{{ public_path('img/social-pension-logo.png') }}" alt="Social Pension Logo"
                class="social-pension-logo">
            <img src="{{ public_path('img/BagongPilipinas.png') }}" alt="Bagong Pilipinas Logo"
                class="bagong-pilipinas-logo">
        </div>
        <div class="header-text">
            <small>DSWD-GF-0104 | REV 00 | 22 SEP 2023</small>
        </div>
    </div>

    <!-- Footer content (on every page) -->
    <footer>
        <div class="footer-content">
            <div class="footer-line"></div>
            <div class="footer-text">
                <strong>PAGE <span class="pagenum"></span></strong>
            </div>
            <div class="footer-address">
                DSWD Field Office XI, R. Magsaysay Avenue corner Suazo Street, Davao City, Philippines 8000<br>
                Website: <a href="http://www.fo11.dswd.gov.ph">http://www.fo11.dswd.gov.ph</a> Tel No./Telefax: (082)
                227-1964
            </div>
        </div>
    </footer>

    <div class="container mt-5">
        <!-- Title Section -->
        <div class="row align-items-center mb-3">
            <div class="col-md-8 text-center mx-auto">
                <h5 class="mb-0">SOCIAL PENSION VALIDATION FORM</h5>
                <h6 class="mb-0">SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS</h6>
            </div>
            <div class="col-md-4 text-center">
                <!-- Picture Upload Section -->
                @if ($beneficiary->profile_upload)
                    <div class="picture-frame">
                        {{-- <span>1x1 picture</span> --}}
                        <img src="{{ asset('storage/' . $beneficiary->profile_upload) }}" alt="Profile Photo">
                    </div>
                @endif
            </div>
        </div>

        {{-- Marc ang header diri na Province and City Municipality --}}
        <td>City/Municipality (Lungsod):
            <span>{{ $beneficiary->addresses->where('type', 'permanent')->first()->city ?? 'N/A' }}</span>
        </td>
        <td>Province (Lalawigan):
            <span>{{ $beneficiary->addresses->where('type', 'permanent')->first()->province ?? 'N/A' }}</span>
        </td>

        <!-- Form Section -->
        <div class="container mt-5">
            <!-- Identification Information -->
            <h4 class="section-title">I. IDENTIFYING INFORMATION (Pagkilala ng Impormasyon)</h4>
            <table class="table">
                <tr>
                    <td colspan="3"><strong>OSCA ID No.:</strong> {{ $beneficiary->osca_id }}</td>
                    <td colspan="2"><strong>NCSC RRN: (if Applicable)</strong> {{ $beneficiary->ncsc_rrn }}</td>
                </tr>

                <tr>
                    <th colspan="5">NAME (Pangalan):</th>
                </tr>
                <tr>
                    <td colspan="1">Last Name (Apelyido): <span>{{ $beneficiary->BeneficiaryInfo->last_name }}</span>
                    </td>
                    <td colspan="2">First Name (Unang Pangalan):
                        <span>{{ $beneficiary->BeneficiaryInfo->first_name }}</span>
                    </td>
                    <td colspan="1">Middle Name (Gitnang Pangalan):
                        <span>{{ $beneficiary->BeneficiaryInfo->middle_name }}</span>
                    </td>
                    <td colspan="1">Ext. (Jr., II): <span>{{ $beneficiary->BeneficiaryInfo->name_extension }}</span>
                    </td>
                </tr>

                <tr>
                    <th colspan="5">MOTHER'S MAIDEN NAME (Pangalan ng Ina sa Pagkadalaga):</th>
                </tr>
                <tr>
                    <td colspan="2">Last Name (Apelyido):
                        <span>{{ $beneficiary->MothersMaidenName->mother_last_name }}</span>
                    </td>
                    <td colspan="2">First Name (Unang Pangalan):
                        <span>{{ $beneficiary->MothersMaidenName->mother_first_name }}</span>
                    </td>
                    <td colspan="1">Middle Name (Gitnang Pangalan):
                        <span>{{ $beneficiary->MothersMaidenName->mother_middle_name }}</span>
                    </td>
                </tr>

                <tr>
                    <th colspan="5">PERMANENT ADDRESS (Permanenting Tirahan):</th>
                </tr>
                <tr>
                    <td>Sitio/House No./Purok/Street:
                        <span>{{ $beneficiary->addresses->where('type', 'permanent')->first()->sitio ?? 'N/A' }}</span>
                    </td>
                    <td>Barangay:
                        <span>{{ $beneficiary->addresses->where('type', 'permanent')->first()->barangay ?? 'N/A' }}</span>
                    </td>
                    <td>City/Municipality (Lungsod):
                        <span>{{ $beneficiary->addresses->where('type', 'permanent')->first()->city ?? 'N/A' }}</span>
                    </td>
                    <td>Province (Lalawigan):
                        <span>{{ $beneficiary->addresses->where('type', 'permanent')->first()->province ?? 'N/A' }}</span>
                    </td>
                    <td>Region (Rehiyon):
                        <span>{{ $beneficiary->addresses->where('type', 'permanent')->first()->region ?? 'N/A' }}</span>
                    </td>
                </tr>

                <tr>
                    <th colspan="5">PRESENT ADDRESS (Kasalukuyang Tirahan):</th>
                </tr>
                <tr>
                    <td>Sitio/House No./Purok/Street:
                        <span>{{ $beneficiary->addresses->where('type', 'present')->first()->sitio ?? 'N/A' }}</span>
                    </td>
                    <td>Barangay:
                        <span>{{ $beneficiary->addresses->where('type', 'present')->first()->barangay ?? 'N/A' }}</span>
                    </td>
                    <td>City/Municipality (Lungsod):
                        <span>{{ $beneficiary->addresses->where('type', 'present')->first()->city ?? 'N/A' }}</span>
                    </td>
                    <td>Province (Lalawigan):
                        <span>{{ $beneficiary->addresses->where('type', 'present')->first()->province ?? 'N/A' }}</span>
                    </td>
                    <td>Region (Rehiyon):
                        <span>{{ $beneficiary->addresses->where('type', 'present')->first()->region ?? 'N/A' }}</span>
                    </td>
                </tr>

                <tr>
                    <th colspan="1">DATE OF BIRTH (Araw ng Kapanganakan):</th>
                    <th colspan="4">PLACE OF BIRTH (Lugar ng Kapanganakan):</th>
                </tr>
                <tr>
                    <td colspan="1">
                        <span>{{ \Carbon\Carbon::parse($beneficiary->MothersMaidenName->date_of_birth)->format('F j, Y') }}
                            </p></span>
                    </td>
                    <td colspan="2">City/Municipality
                        (Lungsod)<span>{{ $beneficiary->MothersMaidenName->place_of_birth_city }}</span></td>
                    <td colspan="2">Province
                        (Lalawigan)<span>{{ $beneficiary->MothersMaidenName->place_of_birth_province }}</span></td>
                </tr>

                <tr>
                    <th colspan="1">AGE (Edad):</th>
                    <th colspan="1">SEX (Kasarian):</th>
                    <th colspan="3">CIVIL STATUS (Katayuang Sibil):</th>
                </tr>
                <tr>
                    <td colspan="1"><span>{{ $beneficiary->MothersMaidenName->age }}</span></td>
                    <td colspan="1"><span>{{ $beneficiary->MothersMaidenName->sex }}</span></td>
                    <td colspan="3"><span>{{ $beneficiary->MothersMaidenName->civil_status }}</span></td>
                </tr>

                <tr>
                    <th colspan="5">AFFILIATION (Pagkakaugnay):</th>
                </tr>
                <tr>
                    <td colspan="1">Affiliation Type:
                        <span>{{ $beneficiary->affiliation->affiliation_type ?? 'N/A' }}</span>
                    </td>
                    <td colspan="2">Household ID: <span>{{ $beneficiary->affiliation->hh_id ?? 'N/A' }}</span></td>
                    <td colspan="2">Indigenous Specify:
                        <span>{{ $beneficiary->affiliation->indigenous_specify ?? 'N/A' }}</span>
                    </td>
                </tr>
            </table>

            <h4 class="section-title">II. FAMILY INFORMATION (Impormasyon ng Pamilya)</h4>
            <table class="table">
                <tr>
                    <th colspan="5">NAME OF SPOUSE (Pangalan ng Asawa):</th>
                </tr>
                <tr>
                    <td colspan="1">Last Name (Apelyido):
                        <span>{{ $beneficiary->spouse->spouse_last_name ?? 'N/A' }}</span>
                    </td>
                    <td colspan="2">First Name (Unang Pangalan):
                        <span>{{ $beneficiary->spouse->spouse_first_name ?? 'N/A' }}</span>
                    </td>
                    <td colspan="1">Middle Name (Gitnang Pangalan):
                        <span>{{ $beneficiary->spouse->spouse_middle_name ?? 'N/A' }}</span>
                    </td>
                    <td colspan="1">Ext. (Jr., II):
                        <span>{{ $beneficiary->spouse->spouse_name_extension ?? 'N/A' }}</span>
                    </td>
                </tr>

                <tr>
                    <th colspan="5">ADDRESS (Tirahan):</th>
                     <tr>
                    <td>Sitio/House No./Purok/Street:
                        <span>{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->sitio ?? 'N/A' }}</span>
                    </td>
                    <td>Barangay:
                        <span>{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->barangay ?? 'N/A' }}</span>
                    </td>
                    <td>City/Municipality (Lungsod):
                        <span>{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->city ?? 'N/A' }}</span>
                    </td>
                    <td>Province (Lalawigan):
                        <span>{{ $beneficiary->addresses->where('type', 'spouse_addresst')->first()->province ?? 'N/A' }}</span>
                    </td>
                    <td>Region (Rehiyon):
                        <span>{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->region ?? 'N/A' }}</span>
                    </td>
                    <td colspan="1"><span></span></td>
                </tr>
                <td colspan="1">CONTACT NUMBER(Numero ng Telepono):
                    <span>{{ $beneficiary->spouse->spouse_contact ?? 'N/A' }}</span>
                </td>
               
                <tr>
                    <th colspan="5">CHILDREN (Mga Anak):</th>
                </tr>
                <tr>
                    @foreach ($beneficiary->child as $child)
                        <td>NAME(Pangalan): <span>{{ $child->children_name ?? 'N/A' }}</span></td>
                        <td>CIVIL STATUS(Katayuang Sibil): <span>{{ $child->children_civil_status ?? 'N/A' }}</span>
                        </td>
                        <td>OCCUPATION(Trabaho): <span>{{ $child->children_occupation ?? 'N/A' }}</span></td>
                        <td>INCOME(Kita o Sahod): <span>{{ $child->children_income ?? 'N/A' }}</span></td>
                        <td>CONTACT NUMBER(Numero ng Telepono):
                            <span>{{ $child->children_contact_number ?? 'N/A' }}</span>
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <th colspan="5">NAME OF AUTHORIZED REPRESENTATIVES:</th>
                </tr>
                <tr>
                    @foreach ($beneficiary->representative as $representative)
                        <td colspan="3">NAME(Pangalan):
                            <span>{{ $representative->representative_name ?? 'N/A' }}</span>
                        </td>
                        <td colspan="1">RELATIONSHIP(Relasyon sa Benepisyaryo):
                            <span>{{ $representative->representative_civil_status ?? 'N/A' }}</span>
                        </td>
                        <td colspan="1">CONTACT NUMBER(Numero ng Telepono):
                            <span>{{ $representative->representative_contact_number ?? 'N/A' }}</span>
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <th colspan="5">LIVING ARRANGEMENT (Kaayusan sa Pamumuhay Anak):</th>
                </tr>
                <tr>
                    <td colspan="3">Housing Situation(Sitwasyon ng Pamamahay):
                        <span>{{ $beneficiary->housingLivingStatus->house_status ?? 'N/A' }}</span>
                        <span> {{ $beneficiary->housingLivingStatus->house_status_others_input ?? 'N/A'}}</span>
                    </td>

                    <td colspan="2">Living Arrangement (kaayusan sa pamumuhay):
                        <span>{{ $beneficiary->housingLivingStatus->living_status ?? 'N/A' }}</span>
                        {{ $beneficiary->housingLivingStatus->living_status_others_input ?? 'N/A' }}</span>
                    </td>
                </tr>
            </table>
            <h4 class="section-title">III. ECONOMIC INFORMATION (Impormasyong Pang-ekonomiya)</h4>
            <table class="table">
                <tr>
                    <th colspan="5">RECEIVING PENSION (Tumatanggap ng pension):</th>
                </tr>
                <tr>
                    <td colspan="1">Yes(Oo)/No(Wala):
                        <span>{{ $beneficiary->economicInformation->receiving_pension ?? 'N/A' }}</span>
                    </td>
                    <td colspan="1">How much (Magkano):
                        <span>{{ $beneficiary->economicInformation->pension_amount ?? 'N/A' }}</span>
                    </td>
                    <td colspan="3">Source (Mula saan):
                        <span>{{ $beneficiary->economicInformation->pension_source ?? 'N/A' }}</span>
                    </td>
                </tr>
                <tr>
                    <th colspan="5">PERMANENT INCOME (Permanenteng Kita):</th>
                </tr>
                <tr>
                    <td colspan="1">Yes(Oo)/No(Wala):
                        <span>{{ $beneficiary->economicInformation->permanent_income ?? 'N/A' }}</span>
                    </td>
                    <td colspan="1">How much (Magkano):
                        <span>{{ $beneficiary->economicInformation->income_amount ?? 'N/A' }}</span>
                    </td>
                    <td colspan="3">Source (Mula saan):
                        <span>{{ $beneficiary->economicInformation->income_source ?? 'N/A' }}</span>
                    </td>
                </tr>
                <tr>
                    <th colspan="5">REGULAR SUPPORT (Regular na Suporta):</th>
                </tr>
                <tr>
                    <td colspan="1">Yes(Oo)/No(Wala):
                        <span>{{ $beneficiary->economicInformation->regular_support ?? 'N/A' }}</span>
                    </td>
                    <td colspan="1">How much (Magkano):
                        <span>{{ $beneficiary->economicInformation->support_amount ?? 'N/A' }}</span>
                    </td>
                    <td colspan="3">Source (Mula saan):
                        <span>{{ $beneficiary->economicInformation->support_source ?? 'N/A' }}</span>
                    </td>
                </tr>
            </table>
            <h4 class="section-title">IV. HEALTH INFORMATION (Impormasyon sa Kalusugan)</h4>
            <table class="table">
                <tr>
                    <th colspan="5">WITH EXISTING ILLNESS (May Karamdaman):</th>
                </tr>
                <tr>
                    <td colspan="2">Yes(Oo)/No(Wala):
                        <span>{{ $beneficiary->healthInformation->existing_illness ?? 'N/A' }}</span>
                    </td>
                    <td colspan="3">Specify (Itala):
                        <span>{{ $beneficiary->healthInformation->illness_specify ?? 'N/A' }}</span>
                    </td>
                </tr>
                <tr>
                    <th colspan="5">WITH DISABILITY (May Kapansanan):</th>
                </tr>
                <tr>
                    <td colspan="2">Yes(Oo)/No(Wala):
                        <span>{{ $beneficiary->healthInformation->with_disability ?? 'N/A' }}</span>
                    </td>
                    <td colspan="3">Specify (Itala):
                        <span>{{ $beneficiary->healthInformation->disability_specify ?? 'N/A' }}</span>
                    </td>
                </tr>
                <tr>
                    <th colspan="5">FRAILTY QUESTIONS:</th>
                </tr>
                <tr>
                    <td>1. Do you experience difficulty in doing your ADLs? (Yes/No)
                        <span>{{ $beneficiary->healthInformation->difficult_adl ?? 'N/A' }}</span>
                    </td>
                    <td>2. Are you completely dependent on someone in doing your IADLs?
                        (Yes/No)<span>{{ $beneficiary->healthInformation->dependent_iadl ?? 'N/A' }}</span></td>
                    <td>3. Are you experiencing weight loss, weakness, exhaustion?
                        (Yes/No)<span>{{ $beneficiary->healthInformation->experience_loss ?? 'N/A' }}</span></td>
                </tr>
            </table>
            <h4 class="section-title">V. ASSESSMENT (Pagtatasa)</h4>
            <table class="table">
                <tr>
                    <td colspan="5">{{ $beneficiary->assessmentRecommendation->remarks ?? 'N/A' }}</td>
                </tr>
            </table>
            <h4 class="section-title">VI. RECOMMENDATION (Rekomendasyon)</h4>
            <table class="table">
                <tr>
                    <td colspan="5">{{ $beneficiary->assessmentRecommendation->eligibility ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th colspan="5">Validated by:</th>
                </tr>
                <tr>
                    <td colspan="2">Signature over Printed
                        Name<span>{{ $beneficiary->economicInformation->permanent_income ?? 'N/A' }}</span></td>
                    <td colspan="2">
                        Designation<span>{{ $beneficiary->economicInformation->income_amount ?? 'N/A' }}</span></td>
                    <td colspan="1">
                        Date<span>{{ $beneficiary->economicInformation->income_source ?? 'N/A' }}</span></td>
                </tr>
                <tr>
                    <th colspan="5">Econded by:</th>
                </tr>
                <tr>
                    <td colspan="2">Signature over Printed
                        Name<span>{{ $beneficiary->economicInformation->permanent_income ?? 'N/A' }}</span></td>
                    <td colspan="2">
                        Designation<span>{{ $beneficiary->economicInformation->income_amount ?? 'N/A' }}</span></td>
                    <td colspan="1">
                        Date<span>{{ $beneficiary->economicInformation->income_source ?? 'N/A' }}</span></td>
                </tr>
                <tr>
                    <th colspan="5">By signing this form, I grant my free and voluntary consent for the Department
                        of Social Welfare and Development (DSWD) to collect, process, and share my personal information
                        for the purpose of validation, eligibility test, and cross-matching to serve as the basis in
                        granting my entitlements as a qualified beneficiary of the Social Pension for Indigent Senior
                        Citizens (SPISC) Program. As a data subject, I understand that I have the right to be informed,
                        access, object, block, file complaints or damages or rectify my personal information obtained,
                        processed, or shared as well as the purpose and reason for processing or sharing this personal
                        information.
                    </th>
                </tr>
                <tr>
                    <th colspan="5">Confirmed by:</th>
                </tr>
                <tr>
                    <td colspan="2">Name of Applicant or
                        Respondent<span>{{ $beneficiary->economicInformation->permanent_income ?? 'N/A' }}</span></td>
                    <td colspan="2">Signature or
                        Thumbmark<span>{{ $beneficiary->economicInformation->income_amount ?? 'N/A' }}</span></td>
                    <td colspan="1">
                        Date<span>{{ $beneficiary->economicInformation->income_source ?? 'N/A' }}</span></td>
                </tr>
                <tr>
                    <th colspan="5">DATA PRIVACY
                        In compliance with the provisions of Republic Act No. 10173, also known as the Data Privacy Act
                        of 2012 and its Implementing Rules and Regulations (IRR), the Department of Social Welfare and
                        Development (DSWD) ensures that the personal information provided is collected and processed by
                        authorized personnel and is only used for the implementation of the Social Pension for Indigent
                        Senior Citizens (SPISC) Program as mandated under Republic Act No. 9994
                    </th>
                </tr>
            </table>
        </div>

        <a href="{{ route('export.pdf') }}" class="btn btn-primary export-button no-print">Export to PDF</a>
</body>
