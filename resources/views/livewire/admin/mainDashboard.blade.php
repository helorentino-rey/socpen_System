@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
            }



            .content {
                margin-left: 250px;
                padding: 20px;
                transition: margin-left 0.3s;
            }

            .content.retracted {
                margin-left: 80px;
            }

            .card {
                border-left: 4px solid #1C4CB1;
            }

            .card-title {
                font-weight: bold;
            }

            .logo {
                width: 150px;
                margin: 20px auto;
                display: block;
            }

            .search-bar {
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .plus-button {
                position: absolute;
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                background-color: #1C4CB1;
                border-radius: 50%;
                color: white;
                text-align: center;
                line-height: 50px;
                font-size: 24px;
                cursor: pointer;
            }

            .toggle-button {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                right: -15px;
                width: 30px;
                height: 30px;
                background-color: #1C4CB1;
                border-radius: 50%;
                color: white;
                text-align: center;
                line-height: 30px;
                cursor: pointer;
                font-size: 16px;
            }
        </style>

    </head>

    <body>

        <!-- Main Content -->
        <div class="content" id="content">

            <h1>Department of Social Welfare and Development</h1>
            <input type="text" class="form-control search-bar" placeholder="Search Beneficiaries">

            <!-- Bootstrap Card Example -->
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4 text-center">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1 card-title">
                                        Approved Beneficiaries
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">50</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-person-check-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4 text-center">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1 card-title">
                                        Pending Beneficiaries
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-person-dash-fill fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add more cards as needed -->
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.getElementById('toggleButton').addEventListener('click', function() {
                var sidebar = document.getElementById('sidebar');
                var content = document.getElementById('content');
                sidebar.classList.toggle('retracted');
                content.classList.toggle('retracted');

                var icon = this.querySelector('i');
                if (sidebar.classList.contains('retracted')) {
                    icon.classList.remove('bi-chevron-left');
                    icon.classList.add('bi-chevron-right');
                } else {
                    icon.classList.remove('bi-chevron-right');
                    icon.classList.add('bi-chevron-left');
                }
            });
        </script>

    </body>

    </html>
