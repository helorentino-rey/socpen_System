<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            /* Light grey background */
            margin: 0;
            height: 100vh;
        }

        .wrapper {
            background-color: white;
            /* Default background color for the whole window */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        .container {
            max-width: 800px;
            width: 100%;
            display: flex;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
            padding: 20px;
            /* Ensure padding inside the container */
        }

        .section {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
        }

        .left-section {
            background-color: #1C4CB1;
            /* DSWD Blue */
            color: white;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            padding: 20px;
            box-sizing: border-box;
            min-height: 200px;
            /* Adjust based on content */
        }

        .right-section {
            background-color: white;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            padding: 20px;
            box-sizing: border-box;
            min-height: 200px;
            /* Adjust based on content */
        }

        .btn-admin,
        .btn-superadmin,
        .btn-staff {
            color: white;
            border: none;
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-admin {
            background-color: #1C4CB1;
            /* DSWD Blue */
        }

        .btn-admin:hover,
        .btn-superadmin:hover {
            background-color: #163a8c;
        }

        .btn-superadmin {
            background-color: #4a4791;
            /* Another shade of blue */
        }

        .btn-staff {
            background-color: #FF0000;
            /* DSWD Red */
        }

        .btn-staff:hover {
            background-color: #4a4791;
            /* Updated hover color */
        }

        .logo-container img {
            max-width: 300px;
            /* Adjust this value to make the logo larger */
            display: block;
            margin: 0 auto 20px;
        }

        h1 {
            font-size: 1.5rem;
        }

        h2 {
            font-size: 1.75rem;
        }

        h3 {
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="wrapper" id="wrapper">
        <div class="container">
            <div class="section left-section">
                <div class="logo-container">
                    <img src="{{ asset('img/DSWD_Logo.png') }}" alt="DSWD Logo">
                    <h2>Field Office XI - Davao Region</h2>
                    <h3>Social Pension Unit</h3>
                </div>
            </div>
            <div class="section right-section">
                <div class="logo-container">
                    <img src="{{ asset('img/social-pension-logo.png') }}" alt="Social Pension Logo">
                </div>
                <h1>Welcome back</h1>
                <p class="text-muted">Login as</p>
                <div class="mt-4">
                    <a href="{{ route('superadmin.login') }}" class="btn btn-superadmin btn-lg">Super Admin</a>
                    <a href="{{ route('admin.login') }}" class="btn btn-admin btn-lg">Admin</a>
                    <a href="{{ route('staff.login') }}" class="btn btn-staff btn-lg">Staff</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript to handle background color changes
        document.querySelector('.btn-superadmin').addEventListener('mouseover', function() {
            document.getElementById('wrapper').style.backgroundColor =
                '#4a4791'; // Updated color for super admin button hover
        });
        document.querySelector('.btn-admin').addEventListener('mouseover', function() {
            document.getElementById('wrapper').style.backgroundColor = '#111828';
        });
        document.querySelector('.btn-admin').addEventListener('mouseout', function() {
            document.getElementById('wrapper').style.backgroundColor = 'white';
        });
        document.querySelector('.btn-staff').addEventListener('mouseover', function() {
            document.getElementById('wrapper').style.backgroundColor =
                '#4a4791'; // Updated color for staff button hover
        });
        document.querySelector('.btn-staff').addEventListener('mouseout', function() {
            document.getElementById('wrapper').style.backgroundColor = 'white';
        });
    </script>
</body>
