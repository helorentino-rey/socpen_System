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
        border-left: 5px solid blue; /* Blue border on the left side */
    }

    .kpi-card .icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%); /* Center icon vertically */
        font-size: 1.5rem;
        color: grey; /* Grey color for the icon */
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

    .chart-card h3 {
        font-size: 1.5rem; /* Increase font size for chart titles */
        margin-bottom: 10px; /* Add space below the title */
    }

    .pie-chart {
        width: 90% !important;
        height: 420px !important; /* Adjusted height for pie chart */
    }

    .doughnut-chart {
        width: 75% !important;
        height: 360px !important; /* Adjusted height for doughnut chart */
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
        border: 2px solid #dee2e6; /* Box border around the table */
        border-radius: 0.5rem; /* Rounded corners for the table box */
        background-color: #ffffff; /* Background color of the table box */
        box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1); /* Shadow effect for the table box */
    }

    .beneficiary-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: auto; /* Allows table to adjust column widths */
    }

    .beneficiary-table th, .beneficiary-table td {
        border: 1px solid #dee2e6;
        padding: 12px; /* Increased padding for better readability */
        text-align: center;
        font-size: 1rem; /* Slightly larger font size for readability */
    }

    .beneficiary-table th {
        background-color: #f1f1f1;
        font-weight: bold; /* Make the header text bold */
    }

    .beneficiary-table td {
        background-color: #ffffff;
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
                <i class="fas fa-users icon"></i>
            </div>

            <!-- Unvalidated Beneficiary -->
            <div class="kpi-card blue-border">
                <h3>Unvalidated Beneficiary</h3>
                <p>2</p>
                <i class="fas fa-exclamation-triangle icon"></i>
            </div>

            <!-- Total Beneficiaries -->
            <div class="kpi-card blue-border">
                <h3>Total Beneficiaries</h3>
                <p>5</p>
                <i class="fas fa-calendar-check icon"></i>
            </div>

             <!-- Total Number of Staff -->
             <div class="kpi-card blue-border">
                <h3>Total Number of Staff</h3>
                <p>1</p>
                <i class="fas fa-user-tie icon"></i>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-container">
            <div class="chart-card">
                <canvas id="myChart" class="pie-chart"></canvas>
                <div class="chart-info">
                    @foreach ($beneficiariesByProvince as $province => $count)
                       <!-- Example data visualization -->
                       <p>{{ $province }}: {{ $count }}</p>
                    @endforeach
                </div>
            </div>
            <div class="chart-card">
                <canvas id="sexChart" class="doughnut-chart"></canvas>
                <div class="chart-info">
                    @foreach ($beneficiariesBySex as $sex => $count)
                        <!-- Example data visualization -->
                        <p>{{ $sex }}: {{ $count }}</p>
                    @endforeach
                </div>
            </div>
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

        <!-- Beneficiaries by Status Table -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script>
    // Log the data to ensure it's being passed correctly
    console.log("Beneficiaries by Province:", {!! json_encode($beneficiariesByProvince) !!});
    console.log("Beneficiaries by Sex:", {!! json_encode($beneficiariesBySex) !!});
    console.log("Age Distribution:", {!! json_encode($ageDistribution) !!});
    console.log("Beneficiary Registrations:", {!! json_encode($beneficiaryRegistrations) !!});

    const labels = {!! json_encode($beneficiariesByProvince->keys()) !!};
    const dataValues = {!! json_encode($beneficiariesByProvince->values()) !!};

    const data = {
        labels: labels,
        datasets: [{
            label: 'Beneficiaries by Province',
            data: dataValues,
            backgroundColor: [
                '#0000FF', '#1E90FF', '#00BFFF', '#87CEFA', '#ADD8E6', '#4682B4', '#4169E1', '#6495ED', '#5F9EDF', '#00CED1'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Beneficiaries by Province'
                }
            }
        },
    };

    const sexLabels = {!! json_encode($beneficiariesBySex->keys()) !!};
    const sexDataValues = {!! json_encode($beneficiariesBySex->values()) !!};

    const sexData = {
        labels: sexLabels,
        datasets: [{
            label: 'Beneficiaries by Sex',
            data: sexDataValues,
            backgroundColor: ['#87CEEB', '#FFC0CB'], // Sky blue for male, pink for female
            borderWidth: 1
        }]
    };

    const sexConfig = {
        type: 'doughnut',
        data: sexData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Beneficiaries by Sex'
                }
            }
        },
    };

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

    function prepareChartData(data) {
        const labels = [];
        const counts = [];

        data.forEach(item => {
            const monthName = moment(`${item.year}-${String(item.month).padStart(2, '0')}`, 'YYYY-MM').format('MMMM YYYY');
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
