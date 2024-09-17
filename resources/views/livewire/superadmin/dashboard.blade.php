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
            height: 40px;
            margin-right: 10px;
        }

        .logo-container img.socpen-logo {
            height: 60px;
        }

        .page-title {
            font-size: 1rem;
            color: #495057;
            margin: 0;
            text-align: center;
            flex: 1;
            font-weight: bold; /* Make the title text bold */
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
            padding: 10px;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
            min-width: 0;
        }

        .kpi-card h3 {
            margin-bottom: 5px;
            color: #495057;
            font-size: 1rem;
        }

        .kpi-card p {
            font-size: 2rem;
            font-weight: bold;
            color: #212529;
            margin: 0;
        }

        .chart-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 10px;
        }

        .chart-card {
            flex: 1;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            text-align: center;
            padding: 20px;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .chart-card canvas {
            width: 100% !important;
            height: 300px !important;
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
            font-size: 0.8rem;
            margin: 2px 0;
        }

        /* Table Styles */
        .beneficiary-table-container {
            overflow-x: auto;
            margin-top: 20px;
            -webkit-overflow-scrolling: touch; /* Smooth scrolling on touch devices */
        }

        .beneficiary-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto; /* Allows table to adjust column widths */
        }

        .beneficiary-table th, .beneficiary-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
            font-size: 0.8rem; /* Reduced font size for compactness */
        }

        .beneficiary-table th {
            background-color: #f1f1f1;
            font-weight: bold; /* Make the header text bold */
        }

        .beneficiary-table td {
            background-color: #ffffff;
        }
    </style>

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
            <div class="kpi-card active-beneficiary">
                <h3>Active Beneficiary</h3>
                <p>{{ $activeBeneficiaries }}</p>
            </div>

            <!-- Unvalidated Beneficiary -->
            <div class="kpi-card">
                <h3>Unvalidated Beneficiary</h3>
                <p>{{ $unvalidatedBeneficiaries }}</p>
            </div>

            <!-- Total Number of Staff -->
            <div class="kpi-card">
                <h3>Total Number of Staff</h3>
                <p>{{ $totalStaff }}</p>
            </div>

            <!-- Total Beneficiaries -->
            <div class="kpi-card">
                <h3>Total Beneficiaries</h3>
                <p>{{ $totalBeneficiaries }}</p>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-container">
            <div class="chart-card">
                <canvas id="myChart"></canvas>
                <div class="chart-info">
                    @foreach ($beneficiariesByProvince as $province => $count)
                        <p>{{ $province }}: {{ $count }}</p>
                    @endforeach
                </div>
            </div>
            <div class="chart-card">
                <canvas id="sexChart"></canvas>
                <div class="chart-info">
                    @foreach ($beneficiariesBySex as $sex => $count)
                        <p>{{ $sex }}: {{ $count }}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Bar Chart Section -->
        <div class="chart-container">
            <div class="chart-card">
                <canvas id="ageChart"></canvas>
            </div>
        </div>

        <!-- Time Combo Chart Section -->
        <div class="chart-container">
            <div class="chart-card">
                <canvas id="timeComboChart"></canvas>
            </div>
        </div>

        <!-- Beneficiaries by Status and Province Table -->
        <div class="beneficiary-table-container">
            <table class="beneficiary-table">
                <thead>
                    <tr>
                        <th>Province</th>
                        @foreach (['ACTIVE', 'WAITLISTED', 'SUSPENDED', 'UNVALIDATED', 'NOT LOCATED', 'DOUBLE ENTRY', 'TRANSFER OF RESIDENCE', 'RECEIVING SUPPORT FROM THE FAMILY', 'RECEIVING PENSION FROM OTHER AGENCY', 'WITH PERMANENT INCOME'] as $status)
                            <th>{{ $status }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiariesByStatusAndProvince as $province => $statuses)
                        <tr>
                            <td>{{ $province }}</td>
                            @foreach (['ACTIVE', 'WAITLISTED', 'SUSPENDED', 'UNVALIDATED', 'NOT LOCATED', 'DOUBLE ENTRY', 'TRANSFER OF RESIDENCE', 'RECEIVING SUPPORT FROM THE FAMILY', 'RECEIVING PENSION FROM OTHER AGENCY', 'WITH PERMANENT INCOME'] as $status)
                                <td>{{ $statuses->where('status', $status)->first()->count ?? 0 }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>

    <script>
        // Prepare data for the pie chart
        const labels = {!! json_encode($beneficiariesByProvince->keys()) !!};
        const dataValues = {!! json_encode($beneficiariesByProvince->values()) !!};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Beneficiaries by Province',
                data: dataValues,
                backgroundColor: ['#00FFFF', '#89CFF0', '#0000FF', '#0096FF', '#0047AB'],
            }]
        };

        const config = {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Beneficiaries by Province'
                    }
                }
            },
        };

        // Prepare data for the sex chart
        const sexLabels = {!! json_encode($beneficiariesBySex->keys()) !!};
        const sexDataValues = {!! json_encode($beneficiariesBySex->values()) !!};

        const sexData = {
            labels: sexLabels,
            datasets: [{
                label: 'Beneficiaries by Sex',
                data: sexDataValues,
                backgroundColor: ['#87CEEB', '#FFC0CB'], // Sky blue for male, pink for female
            }]
        };

        const sexConfig = {
            type: 'doughnut',
            data: sexData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Beneficiaries by Sex'
                    }
                }
            },
        };

        // Prepare data for the bar chart
        const ageLabels = {!! json_encode($ageDistribution->keys()) !!};
        const ageDataValues = {!! json_encode($ageDistribution->values()) !!};

        const ageData = {
            labels: ageLabels,
            datasets: [{
                label: 'Age Distribution of Beneficiaries',
                data: ageDataValues,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
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
                    datalabels: {
                        anchor: 'end',
                        align: 'end',
                        formatter: (value) => value,
                        color: 'black',
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Age'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Beneficiaries'
                        }
                    }
                }
            },
        };

        // Beneficiaries per Month and Year
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
            const { labels, counts } = prepareChartData(data);

            const ctx = document.getElementById('timeComboChart').getContext('2d');
            new Chart(ctx, {
                data: {
                    labels: labels,
                    datasets: [{
                        type: 'bar',
                        label: 'Monthly Registrations',
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: counts,
                    }, {
                        type: 'line',
                        label: 'Trend Line',
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgb(75, 192, 192)',
                        fill: false,
                        data: counts,
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
                            text: 'Beneficiary Registrations Per Month and Year'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Number of Beneficiaries'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        }

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
