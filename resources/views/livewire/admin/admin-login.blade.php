<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @livewireStyles
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .card {
            width: 100%;
            max-width: 500px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-body {
            padding: 2rem;
        }

        .card-title {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: #1C4CB1;
            border: none;
            font-size: 1.2rem;
            padding: 0.75rem;
        }

        .btn-primary:hover {
            background-color: #163a8c;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo-container img {
            max-width: 150px;
        }

        .form-label {
            font-size: 1.1rem;
        }

        .form-control {
            font-size: 1.1rem;
            padding: 0.75rem;
        }

        .form-check-label {
            font-size: 1rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1C4CB1;
            color: white;
            padding: 1rem;
            border-radius: 15px 15px 0 0;
        }

        .header img {
            max-height: 50px;
        }

        .header h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        @media (min-width: 768px) {
            .card {
                max-width: 600px;
            }

            .btn-primary {
                font-size: 1.5rem;
                padding: 1rem;
            }

            .card-title {
                font-size: 2rem;
            }

            .form-label,
            .form-control {
                font-size: 1.3rem;
                padding: 1rem;
            }

            .form-check-label {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <div class="card shadow-sm">
        <div class="header">
            <img src="path/to/DSWD-logo.png" alt="DSWD Logo">
            <h1>DSWD Social Pension Unit</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title text-center mb-4">Admin Login</h5>
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="employeeId" class="form-label">Employee ID</label>
                    <input type="text" class="form-control" id="employeeId" name="employee_id" pattern="\d{4}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" minlength="8" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @livewireScripts
</body>

</html>
