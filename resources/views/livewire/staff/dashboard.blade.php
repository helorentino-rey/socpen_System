<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #1C4CB1;
            min-height: 100vh;
            color: white;
            padding: 15px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            transition: width 0.3s;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar .profile-pic {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #fff;
            margin: 0 auto;
            transition: transform 0.3s;
        }

        .sidebar.collapsed .profile-pic {
            transform: scale(0.7);
        }

        .sidebar .profile-name {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
            transition: opacity 0.3s;
        }

        .sidebar.collapsed .profile-name {
            opacity: 0;
            visibility: hidden;
        }

        .sidebar .nav-link {
            color: white;
            display: flex;
            align-items: center;
            transition: background-color 0.3s, padding-left 0.3s;
            padding-left: 10px;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            transition: margin-right 0.3s;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0;
        }

        .sidebar .nav-link:hover {
            background-color: #567be9;
            padding-left: 20px;
        }

        .sidebar.collapsed .nav-link:hover {
            padding-left: 10px;
        }

        .sidebar.collapsed .nav-link .nav-link-text {
            opacity: 0;
            visibility: hidden;
            width: 0;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            transition: margin-left 0.3s;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar.collapsed~.content {
            margin-left: 80px;
        }

        .card {
            border-left: 4px solid #1C4CB1;
        }

        .card-title {
            font-weight: bold;
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

        .toggle-sidebar {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            cursor: pointer;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column" id="sidebar">
        <div class="toggle-sidebar" onclick="toggleSidebar()">
            <i class="bi bi-arrow-left-circle"></i>
        </div>
        <div class="profile-pic">
            <img src="path/to/profile-pic.jpg" alt="Profile Picture" class="img-fluid rounded-circle">
        </div>
        <div class="profile-name">Davao City Staff</div>
        <ul class="nav nav-pills flex-column mb-auto mt-4">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-house-door-fill"></i>
                    <span class="nav-link-text">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-people-fill"></i>
                    <span class="nav-link-text">List of Beneficiary</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-person-fill"></i>
                    <span class="nav-link-text">Staff Information</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content" id="content">
        <div class="text-center">
            <img src="path/to/logo.png" alt="DSWD Logo" class="img-fluid logo">
            <h1 class="mt-3">Department of Social Welfare and Development</h1>
            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Search...">
            </div>
        </div>
    </div>

    <!-- Floating Plus Button -->
    <div class="plus-button">
        <i class="bi bi-plus-lg"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('collapsed');
        }
    </script>
</body>

</html>
