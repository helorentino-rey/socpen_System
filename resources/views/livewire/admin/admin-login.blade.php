<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&family=Raleway:wght@500&display=swap"
        rel="stylesheet">
    <style>
        .login-container {
            display: flex;
            height: 100vh;
        }

        .blue-sidebar {
            background: linear-gradient(45deg, #43232e 0%, #101727 50%, #43232e 100%);
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
            color: #101727;
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
                    <h5 class="card-title text-center mb-4">Admin Login</h5>

                    @if ($errors->has('login_error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('login_error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="employeeId" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employeeId" name="employee_id"
                                pattern="\d{2}-\d{4}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" minlength="8"
                                required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                            <label class="form-check-label" for="rememberMe">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
