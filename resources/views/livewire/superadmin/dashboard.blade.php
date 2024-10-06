@extends('layouts.superadmin')

@section('content')
    <style>
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 10px;
            border: 2px solid #dee2e6;
            border-radius: 0.5rem;
            background-color: #f8f9fa;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .logo-container img {
            height: 60px;
            margin-right: 10px;
        }

        .logo-container img.socpen-logo {
            height: 75px;
        }

        .page-title {
            font-size: 1.4rem;
            color: #3a3a3a;
            margin: 0;
            text-align: center;
            flex: 1;
            font-weight: bold;
        }

        .kpi-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 10px;
        }

        .kpi-card {
            flex: 1;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            text-align: center;
            padding: 20px 10px;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
            min-width: 0;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .kpi-card h3 {
            margin-bottom: 5px;
            color: #495057;
            font-size: 1rem;
        }

        .kpi-card p {
            font-size: 2rem;
            font-weight: bold;
            color: #3a3a3a;
            margin: 0;
        }

        .kpi-card.blue-border {
            border-left: 5px solid blue;
            /* Blue border on the left side */
        }

        .kpi-card .icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            /* Center icon vertically */
            font-size: 1.5rem;
            color: 00008B;
            /* Grey color for the icon */
        }

        .chart-container {
            display: flex;
            justify-content: space-around;
            /* Align charts with space around them */
            align-items: center;
            /* Center align the charts vertically */
            margin-bottom: 20px;
            gap: 20px;
            /* Gap between the two charts */
        }

        .chart-card {

            flex: 1;
            background-color: #ffffff;
            border: 2px solid #dee2e6;
            border-radius: 0.5rem;
            text-align: center;
            padding: 20px;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 400px;
        }


        .chart-card h3 {
            font-size: 14px;
            /* Set header font size */
            margin-bottom: 10px;
            /* Space below the header */
        }



        .pie-chart {
            width: 100% !important;
            /* Set the width to 100% */
            height: 360px !important;
            /* Set a consistent height */
        }

        .doughnut-chart {
            width: 85% !important;
            /* Set the width to 100% */
            height: 360px !important;
            /* Set a consistent height */
        }

        .chart-info {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 10px;
            gap: 5px;
        }

        .chart-info p {
            font-size: 12px;
            /* Set paragraph font size */
            margin: 10px 0;
            /* Space above and below the text */
        }

        /* Table Styles */

        .chart-card canvas {
            width: 300px;
            /* Set fixed width */
            height: 300px;
            /* Set fixed height */
            max-width: 100%;
            /* Ensure it fits within the card */
        }

        .beneficiary-table-container {
            overflow-x: auto;
            margin-top: 20px;
            margin-bottom: 20px;
            -webkit-overflow-scrolling: touch;
            /* Smooth scrolling on touch devices */
            border: 2px solid #dee2e6;
            /* Box border around the table */
            border-radius: 0.5rem;
            /* Rounded corners for the table box */
            background-color: #ffffff;
            /* Background color of the table box */
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
            /* Shadow effect for the table box */
        }

        .beneficiary-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
            /* Allows table to adjust column widths */
        }

        .beneficiary-table th,
        .beneficiary-table td {
            border: .5px lightgrey;
            padding: 12px;
            /* Increased padding for better readability */
            text-align: center;
            font-family: Arial, sans-serif;
            /* Set font to Arial */
            font-size: 15px;
            /* Font size set to 12px */
        }

        .beneficiary-table th {
            background-color: #191970;
            color: white;
            font-weight: bold;
            /* Make the header text bold */
            font-family: Arial, sans-serif;
            /* Set font to Arial for the header */
            font-size: 12px;
            /* Font size set to 12px for the header */
        }

        .beneficiary-table tr:nth-child(odd) td {
            background-color: #eff5fe;
        }

        .beneficiary-table tr:nth-child(even) td {
            background-color: #d1e8ff;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <!-- Logo Section -->
            <div class="logo-container">
                <img src="{{ asset('img/DSWDColored.png') }}" alt="DSWD Logo">
                <img src="{{ asset('img/social-pension-logo.png') }}" alt="SOCPen Logo" class="socpen-logo">
            </div>

            <!-- Title Section -->
            <h2 class="page-title">SOCIAL PENSION BENEFICIARIES DASHBOARD - REGION XI (DAVAO REGION)</h2>
        </div>

        <!-- KPI Section -->
        <div class="kpi-container">
            <!-- Active Beneficiary -->
            <div class="kpi-card blue-border">
                <h3>Active Beneficiary</h3>
                <p>{{ $activeBeneficiaries }}</p>
                <i class="fas fa-user-check icon"></i>

            </div>

            <!-- Unvalidated Beneficiary -->
            <div class="kpi-card blue-border">
                <h3>Unvalidated Beneficiary</h3>
                <p>{{ $unvalidatedBeneficiaries }}</p>
                <i class="fas fa-exclamation-triangle icon"></i>
            </div>

            <!-- Total Beneficiaries -->
            <div class="kpi-card blue-border">
                <h3>Total Beneficiaries</h3>
                <p>{{ $totalBeneficiaries }}</p>
                <i class="fas fa-users icon"></i>
            </div>

            <!-- Total Number of Staff -->
            <div class="kpi-card blue-border">
                <h3>Total Number of Staff</h3>
                <p>{{ $totalStaff }}</p>
                <i class="fas fa-user-tie icon"></i>


            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-container">
            <div class="chart-card">
                <canvas id="myChart" class="pie-chart"></canvas>
                <div class="chart-info">
                    @foreach ($beneficiariesByProvince as $province => $count)
                    @endforeach
                </div>
            </div>

            <!-- Doughnut Chart Card -->
            <div class="chart-card">
                <canvas id="sexChart" class="doughnut-chart"></canvas>
                <div class="chart-info">
                    @foreach ($beneficiariesBySex as $sex => $count)
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Beneficiaries by Status Table -->
        <div class="beneficiary-table-container">
            <table class="beneficiary-table">
                <thead class="table-header">
                    <tr>
                        <th>PROVINCE</th>
                        @foreach (['ACTIVE', 'WAITLISTED', 'SUSPENDED', 'UNVALIDATED', 'NOT LOCATED', 'DOUBLE ENTRY', 'TRANSFER OF RESIDENCE', 'RECEIVING SUPPORT FROM THE FAMILY', 'RECEIVING PENSION FROM OTHER AGENCY', 'WITH PERMANENT INCOME'] as $status)
                            <th>{{ $status }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiariesByStatusAndProvince as $province => $statuses)
                        <tr class="province-row">
                            <td>{{ $province }}</td>
                            @foreach (['ACTIVE', 'WAITLISTED', 'SUSPENDED', 'UNVALIDATED', 'NOT LOCATED', 'DOUBLE ENTRY', 'TRANSFER OF RESIDENCE', 'RECEIVING SUPPORT FROM THE FAMILY', 'RECEIVING PENSION FROM OTHER AGENCY', 'WITH PERMANENT INCOME'] as $status)
                                <td>{{ $statuses->where('status', $status)->first()->count ?? 0 }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bar Chart Section -->
        <div class="chart-container">
            <div class="chart-card">
                <canvas id="ageChart" class="bar-chart"></canvas>
            </div>
        </div>

        <!-- Time Combo Chart Section -->
        <div class="chart-container">
            <div class="chart-card">
                <canvas id="timeComboChart" class="combo-chart"></canvas>
            </div>
        </div>

        <!-- Chart.js Script -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

        <script>
            // Log the data to ensure it's being passed correctly
            console.log("Beneficiaries by Province:", {!! json_encode($beneficiariesByProvince) !!});
            console.log("Beneficiaries by Sex:", {!! json_encode($beneficiariesBySex) !!});
            console.log("Age Distribution:", {!! json_encode($ageDistribution) !!});
            console.log("Beneficiary Registrations:", {!! json_encode($beneficiaryRegistrations) !!});

            const labels = {!! json_encode($beneficiariesByProvince->keys()) !!};
            const dataValues = {!! json_encode($beneficiariesByProvince->values()) !!};
            // Get the canvas context for ageChart
            const ageCtx = document.getElementById('ageChart').getContext('2d');
            const timeComboCtx = document.getElementById('timeComboChart').getContext('2d');

            // Create a gradient for the bar chart
            const gradient = ageCtx.createLinearGradient(0, 0, 0, 400); // Adjust the gradient direction as needed
            gradient.addColorStop(0, '#6495ED'); // Start color (light sky blue)
            gradient.addColorStop(1, '#4B0082'); // End color (medium purple)
            const comboGradient = timeComboCtx.createLinearGradient(0, 0, 0, 400); // Adjust the gradient direction as needed
            comboGradient.addColorStop(0, '#87CEFA'); // Start color (light blue)
            comboGradient.addColorStop(1, '#9370DB'); // End color (lighter sky blue)

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Beneficiaries by Province',
                    data: dataValues,
                    backgroundColor: [
                        '#0000FF', '#1E90FF', '#00BFFF', '#87CEFA', '#ADD8E6', '#4682B4', '#4169E1', '#6495ED',
                        '#5F9EDF', '#00CED1'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    aspectRatio: 1.2,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                font: {
                                    size: 10
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'Beneficiaries by Province',
                            font: {
                                size: 12,
                                weight: 'bold'
                            },
                            padding: {
                                top: 8
                            }
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            offset: -75,
                            formatter: (value, context) => {
                                return '';
                            },
                            color: '#161616',
                            font: {
                                size: 8,
                                weight: 'bold'
                            },
                            rotation: -45
                        }
                    },
                },
            };

            const sexLabels = {!! json_encode($beneficiariesBySex->keys()) !!};
            const sexDataValues = {!! json_encode($beneficiariesBySex->values()) !!};

            const sexData = {
                labels: sexLabels,
                datasets: [{
                    label: 'Beneficiaries by Sex',
                    data: sexDataValues,
                    backgroundColor: ['#36A2EB', '#FF6384', '#a84db8'],
                    borderWidth: 1
                }]
            };

            const sexConfig = {
                type: 'doughnut',
                data: sexData,
                options: {
                    responsive: true,
                    aspectRatio: 1.05,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                font: {
                                    size: 10
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'Beneficiaries by Sex',
                            font: {
                                size: 12
                            },
                            padding: {
                                top: 8
                            }
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'start',
                            offset: 18,
                            formatter: (value, context) => {
                                return '';
                            },
                            color: '#161616',
                            font: {
                                size: 10,
                                weight: 'bold'
                            },
                        }
                    },
                },
            };
            const ageLabels = {!! json_encode($ageDistribution->keys()) !!};
            const ageDataValues = {!! json_encode($ageDistribution->values()) !!};

            const ageData = {
                labels: ageLabels,
                datasets: [{
                    label: 'Age Distribution of Beneficiaries',
                    data: ageDataValues,
                    backgroundColor: gradient, // Apply gradient to background
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    barThickness: 110,
                }]
            };
            window.onload = function() {
                const ageCtx = document.getElementById('ageChart').getContext('2d');
                new Chart(ageCtx, ageConfig);
            };

            const ageConfig = {
                type: 'bar',
                data: ageData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Age Distribution of Beneficiaries'
                        },
                        font: {
                            size: 12 // Font size for the title
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            formatter: (value) => value,
                            color: '#161616',
                            font: {
                                weight: 'bold'
                            }
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Age',
                                font: {
                                    weight: 'bold',
                                    size: 12 // Optional: Adjust the font size if needed
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Beneficiaries',
                                font: {
                                    weight: 'bold',
                                    size: 12 // Optional: Adjust the font size if needed
                                }
                            }
                        }
                    }
                },
            };

            function prepareChartData(data) {
                const labels = [];
                const counts = [];

                data.forEach(item => {
                    const monthName = moment(`${item.year}-${String(item.month).padStart(2, '0')}`, 'YYYY-MM').format(
                        'MMMM YYYY');
                    labels.push(monthName);
                    counts.push(item.count);
                });

                return {
                    labels,
                    counts
                };
            }

            function prepareChartData(data) {
                const labels = [];
                const counts = [];

                data.forEach(item => {
                    const monthName = moment(`${item.year}-${String(item.month).padStart(2, '0')}`, 'YYYY-MM').format(
                        'MMMM YYYY');
                    labels.push(monthName);
                    counts.push(item.count);
                });

                return {
                    labels,
                    counts
                };
            }

            function renderTimeComboChart(data) {
                const {
                    labels,
                    counts
                } = prepareChartData(data);

                const ctx = document.getElementById('timeComboChart').getContext('2d');

                // Create gradient
                const gradient = ctx.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, 'rgba(147, 112, 219, 0.8)'); // Lighter color at the top
                gradient.addColorStop(1, '#0B2F9F'); // Darker color at the bottom

                new Chart(ctx, {
                    data: {
                        labels: labels,
                        datasets: [{
                            type: 'bar',
                            label: 'Monthly Registrations',
                            backgroundColor: gradient, // Apply gradient to the bars
                            borderColor: 'rgba(75, 192, 192, 1)',
                            data: counts,
                            barThickness: 100,
                            order: 1, // This ensures the bars are rendered first (behind the line)
                            datalabels: {
                                display: true,
                                align: 'end',
                                anchor: 'end',
                                font: {
                                    weight: 'bold',
                                    size: 12 // Adjust the font size if needed
                                },
                                formatter: (value, context) => {
                                    return value;
                                }
                            }
                        }, {
                            type: 'line',
                            label: 'Trend Line',
                            backgroundColor: '#87CEFA',
                            borderColor: '#87CEFA',
                            fill: false,
                            data: counts,
                            datalabels: {
                                display: false // Disable datalabels for the trend line
                            }
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Beneficiary Registrations Per Month and Year',
                                font: {
                                    size: 12, // Font size for the title
                                    weight: 'bold'
                                }
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Month',
                                    font: {
                                        weight: 'bold',
                                        size: 12 // Optional: Adjust the font size if needed
                                    }
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Number of Beneficiaries',
                                    font: {
                                        weight: 'bold',
                                        size: 12 // Optional: Adjust the font size if needed
                                    }
                                },
                                beginAtZero: true
                            }
                        }
                    },
                });
            }
            // Register the plugin
            Chart.register(ChartDataLabels);

            window.onload = function() {
                const beneficiaryRegistrations = @json($beneficiaryRegistrations);
                renderTimeComboChart(beneficiaryRegistrations);

                const ctx = document.getElementById('myChart').getContext('2d');
                new Chart(ctx, config);

                const sexCtx = document.getElementById('sexChart').getContext('2d');
                new Chart(sexCtx, sexConfig);

                const ageCtx = document.getElementById('ageChart').getContext('2d');
                new Chart(ageCtx, ageConfig);
            };
        </script>
    @endsection
