<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&family=Raleway:wght@500&display=swap"
        rel="stylesheet">
    <style>
        .login-container {
            display: flex;
            height: 100vh;
        }

        .blue-sidebar {
            background: linear-gradient(45deg, #48488f 0%, #1e4bb0 50%, #48488f 100%);
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .login-form-container {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .logo {
            max-width: 200px;
            margin-bottom: 20px;
        }

        .dswd-logo {
            max-width: 450px;
            margin-bottom: 20px;
        }

        .field-office-text {
            background-color: white;
            color: #1c4cb0;
            padding: 10px 0;
            margin-bottom: 100px;
            font-family: 'Raleway', sans-serif;
            font-size: 24px;
            font-weight: bold;
            width: 50%;
            text-align: center;
        }

        .social-pension-text {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 32px;
            font-family: 'Roboto', sans-serif;
        }

        .card {
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="blue-sidebar">
            <img src="{{ asset('img/DSWD_Logo.png') }}" alt="DSWD Logo" class="dswd-logo">
            <div class="field-office-text">Field Office XI - Davao Region</div>
            <div class="social-pension-text">Social Pension Unit</div>
        </div>
        <div class="login-form-container">
            <img src="{{ asset('img/social-pension-logo.png') }}" alt="Social Pension Logo" class="logo">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Staff Login</h5>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('staff.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" id="employee_id" name="employee_id" class="form-control" maxlength="10" required
                                pattern="[0-9\-]+"
                                title="Please enter a valid Employee ID (numbers and hyphens only)">
                            <div class="invalid-feedback">
                                Please enter a valid Employee ID (numbers and hyphens only).
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" minlength="8" maxlength="8" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>

                        <div id="emailHelp" class="form-text text-center mt-2">Don't have an account yet?</div>
                        <button type="button" class="btn btn-secondary w-100 mt-2"
                            onclick="window.location='{{ route('register') }}'">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
