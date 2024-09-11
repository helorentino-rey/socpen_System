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

        .container {
            max-width: 1200px;
            margin: 0 auto;
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
                        <span>1x1 picture</span>
                        <img src="{{ asset('storage/' . $beneficiary->profile_upload) }}" alt="Profile Photo">
                    </div>
                @endif
            </div>
        </div>

        <!-- Form Section -->
        <div class="container mt-5">
            <!-- Identification Information -->
            <h4 class="section-title">I. IDENTIFYING INFORMATION (Pagkilala ng Impormasyon)</h4>
            <table class="table">
                <tr>
                    <td colspan="3"><strong>OSCA ID No.:</strong> {{ $beneficiary->osca_id }}</td>
                    <td colspan="2"><strong>NCSC RRN:</strong> {{ $beneficiary->ncsc_rrn }}</td>
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
                    <th colspan="3">ADDRESS (Tirahan):</th>
                    <th colspan="2">CONTACT NUMBER (Numero ng Telepono):</th>
                </tr>
                <tr>
                    <td colspan="1"><span></span></td>
                    <td colspan="1"><span></span></td>
                </tr>
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
                        <td colspan="1">CIVIL STATUS(Katayuang Sibil):
                            <span>{{ $representative->representative_civil_status ?? 'N/A' }}</span>
                        </td>
                        <td colspan="1">CONTACT NUMBER(Numero ng Telepono):
                            <span>{{ $representative->representative_contact_number ?? 'N/A' }}</span>
                        </td>
                    @endforeach
                </tr>
                <tr>
                    <th colspan="5">NAME OF CAREGIVER (Pangalan ng Tagapag-alaga):</th>
                </tr>
                <tr>
                    <td>Last Name (Apelyido): <span>{{ $beneficiary->caregiver->caregiver_last_name ?? 'N/A' }}</span>
                    </td>
                    <td>First Name (Unang Pangalan): <span>
                            {{ $beneficiary->caregiver->caregiver_first_name ?? 'N/A' }}</span></td>
                    <td>Middle Name (Gitnang Pangalan):
                        <span>{{ $beneficiary->caregiver->caregiver_middle_name ?? 'N/A' }}</span>
                    </td>
                    <td>Ext. (Jr., II): <span>{{ $beneficiary->caregiver->caregiver_name_extension ?? 'N/A' }}</span>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">RELATIONSHIP (Relasyon sa Benepisyaryo):</th>
                    <th colspan="2">CONTACT NUMBER (Numero ng telepono):</th>
                </tr>
                <tr>
                    <td colspan="3"><span>{{ $beneficiary->caregiver->caregiver_relationship ?? 'N/A' }}</span></td>
                    <td colspan="2"><span>{{ $beneficiary->caregiver->caregiver_contact ?? 'N/A' }}</span></td>
                </tr>
                <tr>
                    <th colspan="5">LIVING ARRANGEMENT (Kaayusan sa Pamumuhay Anak):</th>
                </tr>
                <tr>
                    <td colspan="3">Housing Situation(Sitwasyon ng Pamamahay):
                        <span>{{ $beneficiary->housingLivingStatus->house_status ?? 'N/A' }}</span>
                    </td>
                    <td colspan="2">Living Arrangement (kaayusan sa pamumuhay):
                        <span>{{ $beneficiary->housingLivingStatus->living_status ?? 'N/A' }}</span>
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
            {{-- <a href="{{ route('export.pdf') }}" class="btn btn-primary export-button no-print">Export to PDF</a> --}}
        </div>

        <!-- Existing body content -->

        <button onclick="generatePDF()" class="export-button no-print">Export to PDF</button>

        <script>
            function generatePDF() {
                const {
                    jsPDF
                } = window.jspdf;
                const exportButton = document.querySelector('.export-button');

                // Hide the export button
                exportButton.style.display = 'none';

                // Create a new jsPDF instance
                const pdf = new jsPDF('p', 'mm', 'a4');

                // Load images
                const dswdLogo = new Image();
                dswdLogo.src = '{{ public_path('img/DSWDColored.png') }}';
                const socialPensionLogo = new Image();
                socialPensionLogo.src = '{{ public_path('img/social-pension-logo.png') }}';
                const bagongPilipinasLogo = new Image();
                bagongPilipinasLogo.src = '{{ public_path('img/BagongPilipinas.png') }}';

                dswdLogo.onload = function() {
                    socialPensionLogo.onload = function() {
                        bagongPilipinasLogo.onload = function() {
                            // Add images to PDF
                            pdf.addImage(dswdLogo, 'PNG', 10, 10, 30, 30);
                            pdf.addImage(socialPensionLogo, 'PNG', 50, 10, 30, 30);
                            pdf.addImage(bagongPilipinasLogo, 'PNG', 90, 10, 30, 30);

                            // Add header text
                            pdf.setFontSize(10);
                            pdf.text('DSWD-GF-0104 | REV 00 | 22 SEP 2023', 10, 50);

                            // Add content
                            pdf.setFontSize(14);
                            pdf.text('SOCIAL PENSION VALIDATION FORM', 10, 60);
                            pdf.text('SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS', 10, 70);

                            pdf.setFontSize(12);
                            pdf.text('I. IDENTIFYING INFORMATION (Pagkilala ng Impormasyon)', 10, 80);

                            pdf.text('OSCA ID No.:', 10, 90);
                            pdf.text('{{ $beneficiary->osca_id }}', 60, 90);

                            pdf.text('NCSC RRN:', 10, 100);
                            pdf.text('{{ $beneficiary->ncsc_rrn }}', 60, 100);

                            // Personal Info
                            pdf.text('NAME (Pangalan):', 10, 110);

                            pdf.text('Last Name (Apelyido):', 10, 120);
                            pdf.text('{{ $beneficiary->BeneficiaryInfo->last_name }}', 60, 120);

                            pdf.text('First Name (Unang Pangalan):', 10, 130);
                            pdf.text('{{ $beneficiary->BeneficiaryInfo->first_name }}', 60, 130);

                            pdf.text('Middle Name (Gitnang Pangalan):', 10, 140);
                            pdf.text('{{ $beneficiary->BeneficiaryInfo->middle_name }}', 60, 140);

                            pdf.text('Ext. (Jr., II):', 10, 150);
                            pdf.text('{{ $beneficiary->BeneficiaryInfo->name_extension }}', 60, 150);

                            // Add mother's maiden name content
                            pdf.setFontSize(14);
                            pdf.text("MOTHER'S MAIDEN NAME (Pangalan ng Ina sa Pagkadalaga):", 10, 160);

                            pdf.setFontSize(12);
                            pdf.text('Last Name (Apelyido):', 10, 170);
                            pdf.text('{{ $beneficiary->MothersMaidenName->mother_last_name }}', 60, 170);

                            pdf.text('First Name (Unang Pangalan):', 10, 180);
                            pdf.text('{{ $beneficiary->MothersMaidenName->mother_first_name }}', 60, 180);

                            pdf.text('Middle Name (Gitnang Pangalan):', 10, 190);
                            pdf.text('{{ $beneficiary->MothersMaidenName->mother_middle_name }}', 60, 190);

                            // Add date of birth and place of birth content
                            pdf.setFontSize(14);
                            pdf.text('DATE OF BIRTH (Araw ng Kapanganakan):', 10, 200);
                            pdf.text('PLACE OF BIRTH (Lugar ng Kapanganakan):', 100, 200);

                            pdf.setFontSize(12);
                            pdf.text(
                                '{{ \Carbon\Carbon::parse($beneficiary->MothersMaidenName->date_of_birth)->format('F j, Y') }}',
                                10, 210);
                            pdf.text('City/Municipality (Lungsod):', 100, 210);
                            pdf.text('{{ $beneficiary->MothersMaidenName->place_of_birth_city }}', 140, 210);

                            pdf.text('Province (Lalawigan):', 100, 220);
                            pdf.text('{{ $beneficiary->MothersMaidenName->place_of_birth_province }}', 140, 220);

                            // Add age, sex, and civil status content
                            pdf.setFontSize(14);
                            pdf.text('AGE (Edad):', 10, 230);
                            pdf.text('SEX (Kasarian):', 60, 230);
                            pdf.text('CIVIL STATUS (Katayuang Sibil):', 110, 230);

                            pdf.setFontSize(12);
                            pdf.text('{{ $beneficiary->MothersMaidenName->age }}', 10, 240);
                            pdf.text('{{ $beneficiary->MothersMaidenName->sex }}', 60, 240);
                            pdf.text('{{ $beneficiary->MothersMaidenName->civil_status }}', 110, 240);

                            // Add permanent address content
                            pdf.setFontSize(14);
                            pdf.text('PERMANENT ADDRESS (Permanenting Tirahan):', 10, 250);

                            pdf.setFontSize(12);
                            pdf.text('Sitio/House No./Purok/Street:', 10, 260);
                            pdf.text(
                                '{{ $beneficiary->addresses->where('type', 'permanent')->first()->sitio ?? 'N/A' }}',
                                60, 260);

                            pdf.text('Barangay:', 10, 270);
                            pdf.text(
                                '{{ $beneficiary->addresses->where('type', 'permanent')->first()->barangay ?? 'N/A' }}',
                                60, 270);

                            pdf.text('City/Municipality (Lungsod):', 10, 280);
                            pdf.text(
                                '{{ $beneficiary->addresses->where('type', 'permanent')->first()->city ?? 'N/A' }}',
                                60, 280);

                            pdf.text('Province (Lalawigan):', 10, 290);
                            pdf.text(
                                '{{ $beneficiary->addresses->where('type', 'permanent')->first()->province ?? 'N/A' }}',
                                60, 290);

                            pdf.text('Region (Rehiyon):', 10, 300);
                            pdf.text(
                                '{{ $beneficiary->addresses->where('type', 'permanent')->first()->region ?? 'N/A' }}',
                                60, 300);

                            // Add present address content
                            pdf.setFontSize(14);
                            pdf.text('PRESENT ADDRESS (Kasalukuyang Tirahan):', 10, 310);

                            pdf.setFontSize(12);
                            pdf.text('Sitio/House No./Purok/Street:', 10, 320);
                            pdf.text(
                                '{{ $beneficiary->addresses->where('type', 'present')->first()->sitio ?? 'N/A' }}',
                                60, 320);

                            pdf.text('Barangay:', 10, 330);
                            pdf.text(
                                '{{ $beneficiary->addresses->where('type', 'present')->first()->barangay ?? 'N/A' }}',
                                60, 330);

                            pdf.text('City/Municipality (Lungsod):', 10, 340);
                            pdf.text(
                                '{{ $beneficiary->addresses->where('type', 'present')->first()->city ?? 'N/A' }}',
                                60, 340);

                            pdf.text('Province (Lalawigan):', 10, 350);
                            pdf.text(
                                '{{ $beneficiary->addresses->where('type', 'present')->first()->province ?? 'N/A' }}',
                                60, 350);

                            pdf.text('Region (Rehiyon):', 10, 360);
                            pdf.text(
                                '{{ $beneficiary->addresses->where('type', 'present')->first()->region ?? 'N/A' }}',
                                60, 360);

                            // Add affiliation content
                            pdf.setFontSize(14);
                            pdf.text('AFFILIATION (Pagkakaugnay):', 10, 370);

                            pdf.setFontSize(12);
                            pdf.text('Affiliation Type:', 10, 380);
                            pdf.text('{{ $beneficiary->affiliation->affiliation_type ?? 'N/A' }}', 60, 380);

                            pdf.text('Household ID:', 10, 390);
                            pdf.text('{{ $beneficiary->affiliation->hh_id ?? 'N/A' }}', 60, 390);

                            pdf.text('Indigenous Specify:', 10, 400);
                            pdf.text('{{ $beneficiary->affiliation->indigenous_specify ?? 'N/A' }}', 60, 400);

                            // Add footer
                            const pageCount = pdf.internal.getNumberOfPages();
                            for (let i = 1; i <= pageCount; i++) {
                                pdf.setPage(i);
                                pdf.setFontSize(10);
                                pdf.text('Page ' + String(i) + ' of ' + String(pageCount), 10, 287);
                                pdf.text('Generated on: ' + new Date().toLocaleDateString(), 150, 287);
                            }

                            // Save the PDF
                            pdf.save('Beneficiary.pdf');

                            // Show the export button again
                            exportButton.style.display = 'block';
                        };
                    };
                };
            }
        </script>
</body>
