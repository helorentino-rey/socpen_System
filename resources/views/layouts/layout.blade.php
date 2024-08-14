<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficiary Management</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
        }

        /* Top Navigation Bar */
        .navbar {
            background-color: #333;
            color: white;
            width: 100%;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar .navbar-brand {
            font-weight: bold;
            font-size: 24px;
            margin-left: 250px; /* Offset for the sidebar */
        }

        .navbar .nav-item {
            margin-left: 250px; /* Offset for the sidebar */
            display: inline-block;
            margin-right: 15px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
        }

        .navbar a:hover {
            background-color: #575757;
            color: white;
        }

        /* Main Content Area */
        .main-content {
            margin-top: 60px; /* To account for the fixed navbar height */
            margin-left: 250px; /* To account for the sidebar */
            padding: 20px;
            background-color: #fff;
            min-height: 100vh;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .navbar .navbar-brand,
            .navbar .nav-item {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Beneficiary Management</div>
        <a class="nav-item" href="{{ route('admin.beneficiaries.create') }}">Add Beneficiary</a>
        
    </nav>

    <div class="main-content">
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
