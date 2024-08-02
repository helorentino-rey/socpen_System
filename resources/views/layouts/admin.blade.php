<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #1C4CB1, #320e3a);
            min-height: 100vh;
            color: white;
            padding: 15px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
        }

        .sidebar .profile-pic {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #fff;
            margin: 0 auto;
        }

        .sidebar .profile-name {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }

        .sidebar .nav-link {
            color: white;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar .nav-link:hover {
            background-color: #567be9;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
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
    </style>

</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="profile-pic"></div>
        <div class="profile-name">Admin</div>
        <ul class="nav nav-pills flex-column mb-auto mt-4">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#beneficiaryMenu"
                    aria-expanded="false" aria-controls="beneficiaryMenu">
                    <i class="bi bi-people-fill"></i> Beneficiaries
                </a>
                <div class="collapse" id="beneficiaryMenu">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ route('admin.beneficiaries.search') }}" class="nav-link"><i
                                    class="bi bi-search"></i> Search Beneficiaries</a></li>
                        <li><a href="{{ route('admin.beneficiaries.approve') }}" class="nav-link"><i
                                    class="bi bi-check-circle"></i> Approve Beneficiaries</a></li>
                        <li><a href="{{ route('admin.beneficiaries.list') }}" class="nav-link"><i
                                    class="bi bi-list-ul"></i> List of Beneficiaries</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#staffMenu"
                    aria-expanded="false" aria-controls="staffMenu">
                    <i class="bi bi-person-fill"></i> Staff
                </a>
                <div class="collapse" id="staffMenu">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ route('admin.staff.approve') }}" class="nav-link"><i
                                    class="bi bi-check-circle"></i> Approve Staff</a></li>
                        <li><a href="{{ route('admin.staff.list') }}" class="nav-link"><i class="bi bi-list-ul"></i>
                                List of Staff</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.account') }}" class="nav-link">
                    <i class="bi bi-info-circle-fill"></i> Account Information
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Floating Plus Button -->
    <div class="plus-button">
        <i class="bi bi-plus-lg"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
