<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #1C4CB1, #320e3a);
            /* Gradient similar to your provided example */
            min-height: 100vh;
            color: white;
            padding: 15px;
            position: fixed;
            transition: width 0.3s;
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

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .profile-pic,
        .sidebar.collapsed .profile-name,
        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .content.collapsed {
            margin-left: 80px;
        }

        .navbar {
            background: linear-gradient(180deg, #1C4CB1, #320e3a);
            /* Gradient for navbar */
            color: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #ccc;
            position: static;
            width: 100%;
        }

        .navbar .toggle-sidebar {
            font-size: 24px;
            cursor: pointer;
        }

        .table-actions i {
            cursor: pointer;
            margin-right: 10px;
            font-size: 20px;
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

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div id="sidebar" class="col-md-2 sidebar">
                <div class="profile-pic"></div>
                <div class="profile-name">Super Admin</div>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-grid-fill"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-person-circle"></i> <span>Admin</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-people-fill"></i> <span>Staff</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-person-lines-fill"></i> <span>Beneficiaries</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-person-fill"></i> <span>Account Information</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-bell-fill"></i> <span>Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div id="main-content" class="col-md-10 content">
                <nav class="navbar">
                    <i class="bi bi-list toggle-sidebar"></i> <span>Super Admin Dashboard</span>
                </nav>
                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>Admin</h2>
                        <button class="btn btn-primary">Add New</button>
                    </div>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Admin Name</th>
                                <th>Employee ID</th>
                                <th>Password</th>
                                <th>Assigned Province</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="admin1.jpg" alt="Admin 1" width="50" height="50" class="rounded">
                                </td>
                                <td>Admin 1</td>
                                <td>11-0001</td>
                                <td>admin001</td>
                                <td>Davao City</td>
                                <td class="table-actions">
                                    <i class="bi bi-pencil-square"></i>
                                    <i class="bi bi-trash-fill"></i>
                                    <i class="bi bi-check-circle"></i>
                                </td>
                            </tr>
                            <!-- Repeat rows for other admins -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('.toggle-sidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('main-content').classList.toggle('collapsed');
        });
    </script>
</body>

</html>
