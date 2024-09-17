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
            margin-top: -80px;
            font-family: Arial, sans-serif;
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

        .socopab-logo {
    height: 40px;
    margin-right: -680px;
    margin-top: -40px;
}

        .header-text {
            font-size: 10px;
            text-align: right;
            line-height: 1;
            display: flex;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        h5,
        h6 {
            margin: 0;
            padding: 0;
            font-weight: bold;
            text-align: center;
            font-size: 15px;
            font-family: Arial, sans-serif;
        }

        .row.align-items-center {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-family: Arial, sans-serif;
        }

        .table th {
            border-top: 1px solid #333;
            border-right: 1px solid #333;
            border-left: 1px solid #333;
            border-bottom: none;
            padding: 4px;
            text-align: left;
            font-family: Arial, sans-serif;
        }

        .table td {
            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: 1px solid #333;
            padding: 4px;
            text-align: left;
            font-family: Arial, sans-serif;
        }

        .section-title {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
            text-transform: uppercase;
            font-size: 12px;
            border-bottom: 1px solid #333;
            padding-bottom: 3px;
            font-family: Arial, sans-serif;
        }

        .section-title2 {
            font-weight: bold;
            margin-top: -3px;
            margin-bottom: 5px;
            text-transform: uppercase;
            font-size: 12px;
            border-bottom: 1px solid #333;
            padding-bottom: 3px;
            font-family: Arial, sans-serif;
        }

        .input-underline {
            border-bottom: 1px solid #000;
            width: 100%;
            display: inline-block;
            margin-top: -2px;
            font-family: Arial, sans-serif;
        }


        footer {
            position: fixed;
            bottom: -30px;
            left: 0;
            right: 0;
            height: 10px;
            /* Adjust height for footer content */
            text-align: center;
            font-size: 10px;
            padding: 5px 20px;
            font-family: Arial, sans-serif;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .footer-line {
            width: 100%;
            border-top: 1px solid #000;
            margin-bottom: 5px;
        }

        .footer-text {
            font-weight: bold;
            font-size: 12px;
            font-family: Arial, sans-serif;
        }

        .footer-address {
            font-size: 10px;
            text-align: center;
            margin-bottom: 5px;
            font-family: Arial, sans-serif;
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

        .table1 {
            width: 100%;
            margin-top: -60px;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
        }

        .table1 td {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            border: none;
            font-family: Arial, sans-serif;
        }

        .table2 {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-family: Arial, sans-serif;
        }

        .table2 td,
        .table2 th {
            padding: 20px;
            height: 100px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-text" style="font-style: italic;">
            <small>DSWD-GF-0104 | REV 00 | 22 SEP 2023</small>
        </div>
        <div class="logos">
            <img src="{{ public_path('img/DSWDColored.png') }}" alt="DSWD Logo" class="dswd-logo">
            <img src="{{ public_path('img/social-pension-logo.png') }}" alt="Social Pension Logo"
                class="social-pension-logo">
            <img src="{{ public_path('img/BagongPilipinas.png') }}" alt="Bagong Pilipinas Logo"
                class="bagong-pilipinas-logo">
        </div>
    </div>

    <!-- Footer content (on every page) -->
    <footer>
    <div class="footer-content">
        <div class="footer-line"></div>
        <div class="footer-text">
            <strong style="font-size:10px;">PAGE <span class="pagenum"></span></strong>
        </div>
        <div class="footer-address-wrapper">
            <div class="footer-address">
                DSWD Field Office XI, R. Magsaysay Avenue corner Suazo Street, Davao City, Philippines 8000<br>
                Website: <a href="http://www.fo11.dswd.gov.ph">http://www.fo11.dswd.gov.ph</a> Tel No./Telefax: (082) 227-1964
            </div>
            <img src="{{ public_path('img/socopab.png') }}" alt="socopab Logo" class="socopab-logo">
        </div>
    </div>
</footer>


    <div class="container mt-5">
        <!-- Title Section -->
        <div class="row align-items-center mb-3">
            <div class="col-md-8 text-center mx-auto">
                <h5 class="mb-0" style="font-size: 25px">SOCIAL PENSION VALIDATION FORM</h5>
                <h6 class="mb-0">SOCIAL PENSION FOR INDIGENT SENIOR CITIZENS</h6>
            </div>
            <div class="col-md-4 text-center">
                <div class="header-text"
                    style="font-weight: bold; font-style:italic; text-align:right; margin-right:80px; margin-top: 30px;">
                    <small>ANNEX 2</small>
                </div>
                <br>
                    <!-- Picture Upload Section -->
                    @if ($profilePhotoUrl)
                    <div class="picture-frame" style="margin-right:20px;">
                        <img src="{{ $profilePhotoUrl }}" alt="Profile Photo">
                    </div>
                @endif
            </div>
        </div>

        <table class="table1">
            <tr>
                <td>
                    <span style="text-decoration: underline;">
                        {{ $beneficiary->addresses->where('type', 'permanent')->first()->city ?? 'N/A' }}
                    </span>
                    <br>
                    <span>City / Municipality</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span
                        style="text-decoration: underline;">{{ $beneficiary->addresses->where('type', 'permanent')->first()->province ?? 'N/A' }}</span>
                    <br>
                    <span>Province</span>
                </td>
            </tr>
        </table>

        <!-- Form Section -->
        <div class="container mt-5">
            <!-- Identification Information -->
            <h4 class="section-title">I. IDENTIFYING INFORMATION <span style="font-style:italic; font-size:12px;">(Pagkilala ng Impormasyon)</span></h4>
            <table class="table">
                <tr class="table">
                    <td colspan="3" style="border-bottom: 1px solid #333; border-top: 1px solid #333; border-left: 1px solid #333; border-right: 1px solid #333;"><strong>OSCA ID No.:</strong> {{ $beneficiary->osca_id }}</td>
                    <td colspan="2" style="border-bottom: 1px solid #333; border-top: 1px solid #333; border-left: 1px solid #333; border-right: 1px solid #333;"><strong>NCSCRRN</strong> <span style="font-style:italic; font-size:8px;">(if
                            Applicable)</span>: {{ $beneficiary->ncsc_rrn }}</td>
                </tr>

                <tr>
                    <th colspan="5">NAME <span style="font-style:italic; font-size:11px;">(Pangalan)</span>:</th>
                </tr>
                <tr>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                        {{ $beneficiary->BeneficiaryInfo->last_name }} <br><span>Last Name <span style="font-style:italic; font-size:8px;">(Apelyido)</span></span>
                    </td>
                    <td colspan="2" style="text-align: center; vertical-align: bottom;"> {{ $beneficiary->BeneficiaryInfo->first_name }}
                        <br><span>First Name <span style="font-style:italic; font-size:8px;">(Unang Pangalan)</span></span>
                    </td>
                    <td colspan="1" style="text-align: center; vertical-align: bottom;"> {{ $beneficiary->BeneficiaryInfo->middle_name }}
                        <br><span>Middle Name <span style="font-style:italic; font-size:8px;">(Gitnang Pangalan)</span></span>
                    </td>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;"> {{ $beneficiary->BeneficiaryInfo->name_extension }}
                        <br><span>Ext. <span style="font-style:italic; font-size:8px;">(Jr., II)</span></span>
                    </td>
                </tr>

                <tr>
                    <th colspan="5">MOTHER'S MAIDEN NAME <span style="font-style:italic; font-size:11px;">(Pangalan ng Ina sa Pagkadalaga)</span>:</th>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                    {{ $beneficiary->MothersMaidenName->mother_last_name }}
                        <br><span>Last Name <span style="font-style:italic; font-size:8px;">(Apelyido)</span></span>
                    </td>
                    <td colspan="2" style="text-align: center; vertical-align: bottom;">{{ $beneficiary->MothersMaidenName->mother_first_name }}
                        <br><span>First Name <span style="font-style:italic; font-size:8px;">(Unang Pangalan)</span></span>
                    </td>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">{{ $beneficiary->MothersMaidenName->mother_middle_name }}
                        <br><span>Middle Name <span style="font-style:italic; font-size:8px;">(Gitnang Pangalan)</span></span>
                    </td>
                </tr>

                <tr>
                    <th colspan="5">PERMANENT ADDRESS <span style="font-style:italic; font-size:11px;">(Permanenteng Tirahan)</span>:</th>
                </tr>
                <tr>
                    <td style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">{{ $beneficiary->addresses->where('type', 'permanent')->first()->sitio ?? 'N/A' }}
                        <br><span>Sitio/House No./Purok/Street</span>
                    </td>
                    <td style="text-align: center; vertical-align: bottom;"> {{ $beneficiary->addresses->where('type', 'permanent')->first()->barangay ?? 'N/A' }}
                        <br><span>Barangay</span>
                    </td>
                    <td style="text-align: center; vertical-align: bottom;">{{ $beneficiary->addresses->where('type', 'permanent')->first()->city ?? 'N/A' }}
                        <br><span>City/Municipality <span style="font-style:italic; font-size:8px;">(Lungsod)</span></span>
                    </td>
                    <td style="text-align: center; vertical-align: bottom;">{{ $beneficiary->addresses->where('type', 'permanent')->first()->province ?? 'N/A' }}
                       <br> <span>Province <span style="font-style:italic; font-size:8px;">(Lalawigan)</span></span>
                    </td>
                    <td style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">{{ $beneficiary->addresses->where('type', 'permanent')->first()->region ?? 'N/A' }}
                        <br><span>Region <span style="font-style:italic; font-size:8px;">(Rehiyon)</span>:</span>
                    </td>
                </tr>

                <tr>
                    <th colspan="5">PRESENT ADDRESS <span style="font-style:italic; font-size:11px;">(Kasalukuyang Tirahan)</span>:</th>
                </tr>
                <tr>
                    <td style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">{{ $beneficiary->addresses->where('type', 'present')->first()->sitio ?? 'N/A' }}
                        <br><span>Sitio/House No./Purok/Street</span>
                    </td>
                    <td style="text-align: center; vertical-align: bottom;"> {{ $beneficiary->addresses->where('type', 'present')->first()->barangay ?? 'N/A' }}
                        <br><span>Barangay</span>
                    </td>
                    <td style="text-align: center; vertical-align: bottom;"> {{ $beneficiary->addresses->where('type', 'present')->first()->city ?? 'N/A' }}
                        <br><span>City/Municipality <span style="font-style:italic; font-size:8px;">(Lungsod)</span></span>
                    </td>
                    <td style="text-align: center; vertical-align: bottom;"> {{ $beneficiary->addresses->where('type', 'present')->first()->province ?? 'N/A' }}
                        <br><span>Province <span style="font-style:italic; font-size:8px;">(Lalawigan)</span></span>
                    </td>
                    <td style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">{{ $beneficiary->addresses->where('type', 'present')->first()->region ?? 'N/A' }}
                        <br><span>Region <span style="font-style:italic; font-size:8px;">(Rehiyon)</span></span>
                    </td>
                </tr>

                <tr>
                    <th colspan="1">DATE OF BIRTH <span style="font-style:italic; font-size:11px;">(Araw ng Kapanganakan)</span>:</th>
                    <th colspan="4">PLACE OF BIRTH <span style="font-style:italic; font-size:11px;">(Lugar ng Kapanganakan)</span>:</th>
                </tr>
                <tr>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                        <span>{{ \Carbon\Carbon::parse($beneficiary->MothersMaidenName->date_of_birth)->format('F j, Y') }}
                            </p></span>
                    </td>
                    <td colspan="2" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">{{ $beneficiary->MothersMaidenName->place_of_birth_city }}
                        <br><span>City/Municipality
                        <span style="font-style:italic; font-size:8px;">(Lungsod)</span></span></td>
                    <td colspan="2" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">{{ $beneficiary->MothersMaidenName->place_of_birth_province }}
                        <br><span> Province</span></td>
                </tr>

                <tr>
                    <th colspan="1">AGE <span style="font-style:italic; font-size:11px;">(Edad)</span>:</th>
                    <th colspan="2">SEX <span style="font-style:italic; font-size:11px;">(Kasarian)</span>:</th>
                    <th colspan="2">CIVIL STATUS <span style="font-style:italic; font-size:11px;">(Katayuang Sibil)</span>:</th>
                </tr>
                <tr>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;"><span>{{ $beneficiary->MothersMaidenName->age }}</span></td>
                    <td colspan="2" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;"><span>{{ $beneficiary->MothersMaidenName->sex }}</span></td>
                    <td colspan="2" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333; border-left: 1px solid #333;"><span>{{ $beneficiary->MothersMaidenName->civil_status }}</span></td>
                </tr>

                <tr>
                    <th colspan="5">AFFILIATION <span style="font-style:italic; font-size:11px;">(Pagkakaugnay)</span>:</th>
                </tr>
                <tr>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">{{ $beneficiary->affiliation->affiliation_type ?? 'N/A' }}
                       <br> <span>Affiliation Type</span>
                    </td>
                    <td colspan="2"  style="text-align: center; vertical-align: bottom;">{{ $beneficiary->affiliation->hh_id ?? 'N/A' }} <br><span>Household ID</span></td>
                    <td colspan="2" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">{{ $beneficiary->affiliation->indigenous_specify ?? 'N/A' }}
                        <br><span>Indigenous Specify</span>
                    </td>
                </tr>
            </table>

            <h4 class="section-title">II. FAMILY INFORMATION <span style="font-style:italic; font-size:12px;">(Impormasyon ng Pamilya)</span></h4>
            <table class="table">
                <tr>
                    <th colspan="5">NAME OF SPOUSE <span style="font-style:italic; font-size:11px;">(Pangalan ng Asawa)</span>:</th>
                </tr>
                <tr>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">{{ $beneficiary->spouse->spouse_last_name ?? 'N/A' }}
                        <br><span>Last Name <span style="font-style:italic; font-size:8px;">(Apelyido)</span></span>
                    </td>
                    <td colspan="2" style="text-align: center; vertical-align: bottom;">{{ $beneficiary->spouse->spouse_first_name ?? 'N/A' }}
                        <br><span>First Name <span style="font-style:italic; font-size:8px;">(Unang Pangalan)</span></span>
                    </td>
                    <td colspan="1" style="text-align: center; vertical-align: bottom;">{{ $beneficiary->spouse->spouse_middle_name ?? 'N/A' }}
                        <br><span>Middle Name <span style="font-style:italic; font-size:8px;">(Gitnang Pangalan)</span>:</span>
                    </td>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">{{ $beneficiary->spouse->spouse_name_extension ?? 'N/A' }} 
                        <br><span>Ext. <span style="font-style:italic; font-size:8px;">(Jr., II)</span>:</span>
                    </td>
                </tr>

                <tr>
                    <th colspan="5">ADDRESS <span style="font-style:italic; font-size:11px;">(Tirahan)</span>:</th>
                <tr>
                    <td colspan="4" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                        <span>{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->sitio ?? 'N/A' }}</span>,
                        <span>{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->barangay ?? 'N/A' }}</span>,
                        <span>{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->city ?? 'N/A' }}</span>,
                        <span>{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->province ?? 'N/A' }}</span>,
                        <span>{{ $beneficiary->addresses->where('type', 'spouse_address')->first()->region ?? 'N/A' }}</span>
                    </td>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">{{ $beneficiary->spouse->spouse_contact ?? 'N/A' }}
                        <br><span>CONTACT NUMBER <span style="font-style:italic; font-size:8px;">(Numero ng Telepono)</span></span>
                    </td>
                </tr>

                <tr>
                    <th colspan="5">CHILDREN <span style="font-style:italic; font-size:11px;">(Mga Anak)</span>:</th>
                </tr>
                @foreach ($beneficiary->child as $child)
                    <tr>
                        <td style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">{{ $child->children_name ?? 'N/A' }} <br><span>NAME <span style="font-style:italic; font-size:8px;">(Pangalan)</span>:</span></td>
                        <td style="text-align: center; vertical-align: bottom;">{{ $child->children_civil_status ?? 'N/A' }} <br><span>CIVIL STATUS <span style="font-style:italic; font-size:8px;">(Katayuang Sibil)</span></span>
                        </td>
                        <td style="text-align: center; vertical-align: bottom;">{{ $child->children_occupation ?? 'N/A' }} <br><span>OCCUPATION <span style="font-style:italic; font-size:8px;">(Trabaho)</span></span></td>
                        <td style="text-align: center; vertical-align: bottom;">{{ $child->children_income ?? 'N/A' }} <br><span>INCOME <span style="font-style:italic; font-size:8px;">(Kita o Sahod)</span></span></td>
                        <td style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">{{ $child->children_contact_number ?? 'N/A' }}
                            <br><span>CONTACT NUMBER <span style="font-style:italic; font-size:8px;">(Numero ng Telepono)</span></span>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <th colspan="5">NAME OF AUTHORIZED REPRESENTATIVES:</th>
                </tr>
                @foreach ($beneficiary->representative as $representative)
                    <tr>
                        <td colspan="2" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">{{ $representative->representative_name ?? 'N/A' }}
                            <br><span>NAME <span style="font-style:italic; font-size:8px;">(Pangalan)</span></span>
                        </td>
                        <td colspan="2" style="text-align: center; vertical-align: bottom;">{{ $representative->representative_civil_status ?? 'N/A' }}
                           <br> <span>RELATIONSHIP <span style="font-style:italic; font-size:8px;">(Relasyon sa Benepisyaryo)</span></span>
                        </td>
                        <td colspan="1" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">{{ $representative->representative_contact_number ?? 'N/A' }}
                            <br><span>CONTACT NUMBER <span style="font-style:italic; font-size:8px;">(Numero ng Telepono)</span></span>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="5">LIVING ARRANGEMENT <span style="font-style:italic; font-size:11px;">(Kaayusan sa Pamumuhay Anak)</span>:</th>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                        <span> {{ $beneficiary->housingLivingStatus->house_status_others_input ?? 'N/A' }}</span>
                        <br><span>Housing Situation <span style="font-style:italic; font-size:8px;">(Sitwasyon ng Pamamahay)</span></span>
                    </td>

                    <td colspan="2" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">
                       <span>{{ $beneficiary->housingLivingStatus->living_status_others_input ?? 'N/A' }}</span>
                        <br><span>Living Arrangement <span style="font-style:italic; font-size:8px;">(Kaayusan sa Pamumuhay)</span></span>
                    </td>
                </tr>
            </table>
            <h4 class="section-title">III. ECONOMIC INFORMATION <span style="font-style:italic; font-size:12px;">(Impormasyong Pang-ekonomiya)</span></h4>
            <table class="table">
                <tr>
                    <th colspan="5">RECEIVING PENSION <span style="font-style:italic; font-size:11px;">(Tumatanggap ng pension)</span>:</th>
                </tr>
                <tr>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                        <span>{{ $beneficiary->economicInformation->receiving_pension ?? 'N/A' }}</span>
                        <br><span>Yes<span style="font-style:italic; font-size:8px;">(Oo)</span> / No<span style="font-style:italic; font-size:8px;">(Wala)</span>
                    </td>
                    <td colspan="1" style="text-align: center; vertical-align: bottom;">
                        <span>{{ $beneficiary->economicInformation->pension_amount ?? 'N/A' }}</span>
                        <br><span>How much <span style="font-style:italic; font-size:8px;">(Magkano)</span></span>
                    </td>
                    <td colspan="3" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">
                        <span>{{ $beneficiary->economicInformation->pension_source ?? 'N/A' }}</span>
                        <br><span>Source <span style="font-style:italic; font-size:8px;">(Mula saan)</span></span>
                    </td>
                </tr>
                <tr>
                    <th colspan="5">PERMANENT INCOME <span style="font-style:italic; font-size:11px;">(Permanenteng Kita)</span>:</th>
                </tr>
                <tr>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                        <span>{{ $beneficiary->economicInformation->permanent_income ?? 'N/A' }}</span>
                        <br><span>Yes<span style="font-style:italic; font-size:8px;">(Oo)</span> / No<span style="font-style:italic; font-size:8px;">(Wala)</span>
                    </td>
                    <td colspan="1" style="text-align: center; vertical-align: bottom;">
                        <span>{{ $beneficiary->economicInformation->income_amount ?? 'N/A' }}</span>
                        <br><span>How much <span style="font-style:italic; font-size:8px;">(Magkano)</span></span>
                    </td>
                    <td colspan="3" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">
                        <span>{{ $beneficiary->economicInformation->income_source ?? 'N/A' }}</span>
                        <br><span>Source <span style="font-style:italic; font-size:8px;">(Mula saan)</span></span>
                    </td>
                </tr>
                <tr>
                    <th colspan="5">REGULAR SUPPORT <span style="font-style:italic; font-size:11px;">(Regular na Suporta)</span></th>
                </tr>
                <tr>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                        <span>{{ $beneficiary->economicInformation->regular_support ?? 'N/A' }}</span>
                        <br><span>Yes<span style="font-style:italic; font-size:8px;">(Oo)</span> / No<span style="font-style:italic; font-size:8px;">(Wala)</span>
                    </td>
                    <td colspan="1" style="text-align: center; vertical-align: bottom;">
                        <span>{{ $beneficiary->economicInformation->support_amount ?? 'N/A' }}</span>
                        <br><span>How much <span style="font-style:italic; font-size:8px;">(Magkano)</span></span>
                    </td>
                    <td colspan="3" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">
                        <span>{{ $beneficiary->economicInformation->support_source ?? 'N/A' }}</span>
                        <br><span>Source <span style="font-style:italic; font-size:8px;">(Mula saan)</span></span>
                    </td>
                </tr>
            </table>
            <h4 class="section-title">IV. HEALTH INFORMATION <span style="font-style:italic; font-size:12px;">(Impormasyon sa Kalusugan)</span></h4>
            <table class="table">
                <tr>
                    <th colspan="5">WITH EXISTING ILLNESS <span style="font-style:italic; font-size:11px;">(May Karamdaman)</span></th>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                        <span>{{ $beneficiary->healthInformation->existing_illness ?? 'N/A' }}</span>
                        <br><span>Yes<span style="font-style:italic; font-size:8px;">(Oo)</span> / None<span style="font-style:italic; font-size:8px;">(Wala)</span>
                    </td>
                    <td colspan="3" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">
                        <span>{{ $beneficiary->healthInformation->illness_specify ?? 'N/A' }}</span>
                        <br><span>Specify <span style="font-style:italic; font-size:8px;">(Itala)</span></span>
                    </td>
                </tr>
                <tr>
                    <th colspan="5">WITH DISABILITY (May Kapansanan):</th>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                        <span>{{ $beneficiary->healthInformation->with_disability ?? 'N/A' }}</span>
                        <br><span>Yes<span style="font-style:italic; font-size:8px;">(Oo)</span> / None<span style="font-style:italic; font-size:8px;">(Wala)</span>
                    </td>
                    <td colspan="3" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">
                        <span>{{ $beneficiary->healthInformation->disability_specify ?? 'N/A' }}</span>
                        <br><span>Specify <span style="font-style:italic; font-size:8px;">(Itala)</span></span>
                    </td>
                </tr>
                <tr>
                    <th colspan="5">FRAILTY QUESTIONS:</th>
                </tr>
                <tr>
                    <td colspan="1" style="text-align: center; vertical-align: bottom; border-left: 1px solid #333;">
                        <span>{{ $beneficiary->healthInformation->difficult_adl ?? 'N/A' }}</span>
                        <br><span>1. Do you experience difficulty in doing your ADLs?</span> <br>
                        <span style="font-style:italic; font-size:8px;">(Nahihirapan ka ba sa iyong pang-araw araw na gawain?)</span>
                    </td>
                    <td colspan="2" style="text-align: center; vertical-align: bottom;">
                        <span>{{ $beneficiary->healthInformation->dependent_iadl ?? 'N/A' }}</span>
                    <br><span>2. Are you completely dependent on someone in doing your IADLs?</span><br>
                    <span style="font-style:italic; font-size:8px;">(Ganap ka bang umaasa sa ibang tao sa pagsasagawa ng iyong gawaing pamumuhay?)</span></td>
                    <td colspan="2" style="text-align: center; vertical-align: bottom; border-right: 1px solid #333;">
                       <span>{{ $beneficiary->healthInformation->experience_loss ?? 'N/A' }}</span>
                    <br><span>3. Are you experiencing weight loss, weakness, exhaustion?</span><br>
                    <span style="font-style:italic; font-size:8px;">(Ikaw ba ay nakakaranas ng pagkabawas ng timbang, kahinaan o pagkapagod?)</span></td>
                </tr>
            </table>
            <h4 class="section-title"><span>DO NOT WRITE BELOW THIS PART FOR DSWD’S USE ONLY</span>
            <br><span style="font-style:italic; font-size:12px; font-weight:500">(Huwag susulatan ang DSWD lamang ang pwedeng gumamit)</span>
            </h4>
            <br>
            <h4 class="section-title">V. ASSESSMENT <span style="font-style:italic; font-size:11px;">(Pagtatasa)</span></h4>
            <table class="table2">
                <tr>
                    <td colspan="5">
                        <textarea
                            style="width: 105%; height: 100px; margin-left: -20px; margin-bottom: -5px; border: 1px solid; margin-top: -10px; font-family: Arial, sans-serif;">{{ $beneficiary->assessmentRecommendation->remarks ?? 'N/A' }}</textarea>
                    </td>
                </tr>
            </table>

            <h4 class="section-title2">VI. RECOMMENDATION <span style="font-style:italic; font-size:12px;">(Rekomendasyon)</span></h4>
            <table class="table">
                <tr>
                    <td colspan="5" style="border-bottom: 1px solid #333; border-top: 1px solid #333; border-left: 1px solid #333; border-right: 1px solid #333;">{{ $beneficiary->assessmentRecommendation->eligibility ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th colspan="5" style="border-bottom: 1px solid #333;">Validated by:</th>
                </tr>
                <tr>
                    <td colspan="2"
                        style="text-align: center; padding-top: 30px; height:50px; vertical-align: bottom; border-left: 1px solid #333;">Signature
                        over Printed
                        Name <br><span style="font-style:italic; font-size:8px;">(Buong Pangalan at Lagda)</span>
                    </td>
                    <td colspan="2"
                    style="text-align: center; padding-top: 30px; height:50px; vertical-align: bottom; border-left: 1px solid #333;">
                        Designation <br><span style="font-style:italic; font-size:8px;">(Position)</span></td>
                    <td colspan="1"
                    style="text-align: center; padding-top: 30px; height:50px; vertical-align: bottom; border-right: 1px solid #333; border-left: 1px solid #333;">
                        Date <br><span style="font-style:italic; font-size:8px;">(Petsa)</span></td>
                </tr>
                <tr>
                    <th colspan="5" style="border-bottom: 1px solid #333;">Econded by:</th>
                </tr>
                <tr>
                    <td colspan="2"
                    style="text-align: center; padding-top: 30px; height:50px; vertical-align: bottom; border-left: 1px solid #333;">Signature
                        over Printed
                        Name <br><span style="font-style:italic; font-size:8px;">(Buong Pangalan at Lagda)</span></td>
                    <td colspan="2"
                    style="text-align: center; padding-top: 30px; height:50px; vertical-align: bottom; border-left: 1px solid #333;">
                        Designation <br><span style="font-style:italic; font-size:8px;">(Position)</span></td>
                    <td colspan="1"
                    style="text-align: center; padding-top: 30px; height:50px; vertical-align: bottom; border-right: 1px solid #333; border-left: 1px solid #333;">
                        Date <br><span style="font-style:italic; font-size:8px;">(Petsa)</span></td>
                </tr>
                <tr>
                    <td colspan="5" style="border-bottom: 1px solid #333; border-top: 1px solid #333; border-left: 1px solid #333; border-right: 1px solid #333; text-align:justify;">By signing this form, I grant my free and voluntary consent for the Department
                        of Social Welfare and Development (DSWD) to collect, process, and share my personal information
                        for the purpose of validation, eligibility test, and cross-matching to serve as the basis in
                        granting my entitlements as a qualified beneficiary of the Social Pension for Indigent Senior
                        Citizens (SPISC) Program. As a data subject, I understand that I have the right to be informed,
                        access, object, block, file complaints or damages or rectify my personal information obtained,
                        processed, or shared as well as the purpose and reason for processing or sharing this personal
                        information.
                        <br>
                        <br>
                        <span style="font-style: italic; text-align:justify;">Sa paglagda nito, binibigyan ko ang aking malaya at
                            boluntaryong pahintulot sa Department of Social Welfare and Development (DSWD) na
                            kolektahin, iproseso, at ibahagi ang aking personal na impormasyon para sa layunin ng
                            validation, eligibility test, at cross-matching para magsilbing batayan sa pagbibigay ng
                            aking mga karapatan bilang isang kwalipikadong benepisyaryo ng Social Pension for Indigent
                            Senior Citizens (SPISC) Program. Bilang isang paksa ng datos, nauunawaan ko na may karapatan
                            akong malaman, ma-access, tumanggi, harangan, maghain ng mga reklamo o pinsala o itama ang
                            aking personal na impormasyong nakuha, naproseso, o ibinahagi pati na rin ang layunin at
                            dahilan para sa pagproseso o pagbabahagi ng personal na impormasyon na ito.
                        </span>
                    </td>
                </tr>
                <tr>
                    <th colspan="5" style="border-bottom: 1px solid #333;">Confirmed by:</th>
                </tr>
                <tr>
                    <td colspan="2"
                    style="text-align: center; padding-top: 30px; height:50px; vertical-align: bottom; border-left: 1px solid #333;">Name of
                        Applicant or
                        Respondent <br><span style="font-style:italic; font-size:8px;">(Pangalan ng Aplikante)</span></td>
                    <td colspan="2"
                    style="text-align: center; padding-top: 30px; height:50px; vertical-align: bottom; border-left: 1px solid #333;">Signature
                        or
                        Thumbmark <br><span style="font-style:italic; font-size:8px;">(Lagda o Thumbmark)</span></td>
                    <td colspan="1"
                    style="text-align: center; padding-top: 30px; height:50px; vertical-align: bottom; border-right: 1px solid #333; border-left: 1px solid #333;">
                        Date <br><span style="font-style:italic; font-size:8px;">(Petsa)</span></td>
                </tr>
                <tr>
                    <td colspan="5" style="border-bottom: 1px solid #333; border-top: 1px solid #333; border-left: 1px solid #333; border-right: 1px solid #333; text-align:justify;">DATA PRIVACY
                        In compliance with the provisions of Republic Act No. 10173, also known as the Data Privacy Act
                        of 2012 and its Implementing Rules and Regulations (IRR), the Department of Social Welfare and
                        Development (DSWD) ensures that the personal information provided is collected and processed by
                        authorized personnel and is only used for the implementation of the Social Pension for Indigent
                        Senior Citizens (SPISC) Program as mandated under Republic Act No. 9994
                        <br>
                        <br>
                        <span style="font-style: italic; text-align:justify;">Bilang pagsunod sa mga probisyon ng Batas Republika 10173, na
                            kilala rin bilang Data Privacy Act of 2012 at ang Implementing Rules and Regulations (IRR)
                            nito, tinitiyak ng Department of Social Welfare and Development (DSWD) na ang personal na
                            impormasyong ibinigay ay kinokolekta at pinoproseso ng awtorisadong mga tauhan at ginagamit
                            lamang para sa pagpapatupad ng Social Pension for Indigent Senior Citizens (SPISC) Program
                            ayon sa mandato sa ilalim ng Batas Republika 9994.
                        </span>
                    </td>
                </tr>
            </table>
        </div>
</body>
