<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Page')</title>
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
            transition: width 0.3s;
            display: flex;
            flex-direction: column;
        }

        .sidebar.retracted {
            width: 80px;
        }

        .sidebar .profile-pic {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #fff;
            margin: 0 auto;
            transition: opacity 0.3s;
        }

        .sidebar.retracted .profile-pic {
            opacity: 0;
        }

        .sidebar .profile-name {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
            transition: opacity 0.3s;
        }

        .sidebar.retracted .profile-name {
            opacity: 0;
        }

        .sidebar .nav-link {
            color: white;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            transition: background-color 0.3s;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
        }

        .sidebar .nav-link i {
            width: 30px;
            text-align: center;
            flex-shrink: 0;
            transition: font-size 0.3s;
        }

        .sidebar.retracted .nav-link {
            padding-left: 0; 
            justify-content: center;
            width: 50px; 
            padding: 10px 0;
        }

        .sidebar.retracted .nav-link i {
            font-size: 20px;
        }

        .sidebar .nav-link span {
            transition: opacity 0.3s, transform 0.3s;
            margin-left: 10px;
            opacity: 1;
            flex-grow: 1;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar.retracted .nav-link span {
            opacity: 0;
            transform: translateX(-100%);
        }

        .sidebar.retracted .nav-link {
            padding-left: 15px;
            justify-content: center;
        }

        /* Hover effect for expanded sidebar */
        .sidebar .nav-link:hover {
            background-color: #567be9;
        }

        .sidebar .nav-link:hover i,
        .sidebar .nav-link:hover span {
            color: #fff;
        }

        /* Hover effect for retracted sidebar */
        .sidebar.retracted .nav-link:hover {
            background-color: transparent;
        }

        .sidebar.retracted .nav-link:hover i {
            background-color: #567be9;
            border-radius: 50%;
        }

        .sidebar.retracted .nav-link:hover span {
            background-color: transparent;
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

        .chevron-icon {
            position: relative;
            top: 5px;
            vertical-align: middle;
        }

        .profile-container {
            position: relative;
            margin-bottom: 20px;
        }

        .sidebar .profile-pic {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 2px solid #4F6DFF;
    background-color: #fff;
    margin: 0 auto;
    transition: opacity 0.3s;
}

        .sidebar.retracted .profile-pic {
            width: 40px;
            height: 40px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column" id="sidebar">
    <div class="profile-container">
        <div class="profile-pic">
        <img src="{{ asset('img/social-pension-logo.png') }}" alt="SOCPen Logo" class="img-fluid rounded-circle">
        </div>
        <div class="profile-name">Admin</div>
        </div>
        <ul class="nav nav-pills flex-column mb-auto mt-4">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="bi bi-house-door-fill"></i> <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.beneficiaries.list') }}" class="nav-link">
                    <i class="bi bi-people-fill"></i> <span>Beneficiaries</span>
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <div class="toggle-button" id="toggleButton">
            <i class="bi bi-chevron-left chevron-icon"></i>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content" id="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('toggleButton').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            var content = document.getElementById('content');
            var icon = this.querySelector('i');

            sidebar.classList.toggle('retracted');
            content.classList.toggle('retracted');

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
