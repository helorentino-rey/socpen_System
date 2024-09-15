@extends('layouts.superadmin')
@section('content')
    <!-- Add this custom CSS to style the KPI cards and the chart -->
    <style>
        .kpi-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .kpi-card {
            flex: 1;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            text-align: center;
            padding: 30px;
            margin: 0 15px;
            box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.1);
        }

        .kpi-card h3 {
            margin-bottom: 15px;
            color: #495057;
            font-size: 1.5rem;
        }

        .kpi-card p {
            font-size: 2.5rem;
            font-weight: bold;
            color: #212529;
        }

        .chart-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .chart-card {
            flex: 1;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            text-align: center;
            padding: 30px;
            margin-right: 20px;
            box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .chart-card:last-child {
            margin-right: 0;
        }

        .chart-card canvas {
            width: 100% !important;
            height: 400px !important;
        }

        .chart-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 20px;
        }

        .chart-info p {
            font-size: 1.1rem;
            margin: 5px 0;
        }
    </style>
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 40px;">SOCIAL PENSION BENEFICIARIES DASHBOARD - REGION XI (DAVAO
            REGION)</h2>

        <!-- KPI Section -->
        <div class="kpi-container">
            <!-- Daily Count -->
            <div class="kpi-card">
                <h3>Active Beneficiary</h3>
                <p>{{ $activeBeneficiaries }}</p>
            </div>

            <!-- Expected Quota -->
            <div class="kpi-card">
                <h3>Unvalidated Beneficiary</h3>
                <p>{{ $unvalidatedBeneficiaries }}</p>
            </div>

            <!-- Pending Approval -->
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

        <!-- Status Text Section -->
        <div class="chart-container">
            <div class="chart-card">
                <h3>Beneficiaries by Status and Province</h3>
                <div class="chart-info">
                    @foreach ($beneficiariesByStatusAndProvince as $province => $statuses)
                        <p><strong>{{ $province }}:</strong></p>
                        @foreach (['ACTIVE', 'WAITLISTED', 'SUSPENDED', 'UNVALIDATED', 'NOT LOCATED', 'DOUBLE ENTRY', 'TRANSFER OF RESIDENCE', 'RECEIVING SUPPORT FROM THE FAMILY', 'RECEIVING PENSION FROM OTHER AGENCY', 'WITH PERMANENT INCOME'] as $status)
                            <p>{{ $status }} - {{ $statuses->where('status', $status)->first()->count ?? 0 }}</p>
                        @endforeach
                    @endforeach
                </div>
            </div>
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
                backgroundColor: ['#FF6384', '#FF9F40', '#FFCD56', '#4BC0C0', '#36A2EB'],
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

        // Prepare data for the doughnut chart
        const sexLabels = {!! json_encode($beneficiariesBySex->keys()) !!};
        const sexDataValues = {!! json_encode($beneficiariesBySex->values()) !!};

        const sexData = {
            labels: sexLabels,
            datasets: [{
                label: 'Beneficiaries by Sex',
                data: sexDataValues,
                backgroundColor: ['#FF6384', '#36A2EB'],
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
                            text: 'Number of Beneficiary'
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
            const {
                labels,
                counts
            } = prepareChartData(data);

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
            const myChart = new Chart(ctx, config);

            const sexCtx = document.getElementById('sexChart').getContext('2d');
            const sexChart = new Chart(sexCtx, sexConfig);

            const ageCtx = document.getElementById('ageChart').getContext('2d');
            const ageChart = new Chart(ageCtx, ageConfig);
        };
    </script>
@endsection
