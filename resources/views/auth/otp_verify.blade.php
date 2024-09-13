<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #2D69F0, #8640F7);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .verification-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 600px;
        }

        .verification-container img {
            width: 180px;
            /* Increase the width to make the logo bigger */
            margin-bottom: 20px;
        }

        .verification-container h2 {
            font-weight: bold;
            color: #333333;
            margin-bottom: 30px;
        }

        .form-control {
            height: 50px;
            text-align: center;
            font-size: 18px;
        }

        .btn-primary {
            background-color: #2D69F0;
            border-color: #2D69F0;
            width: 100%;
            height: 50px;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #2554c7;
        }

        .resend-link {
            margin-top: 15px;
            font-size: 14px;
            color: #007bff;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .resend-link.disabled {
            color: #cccccc;
            pointer-events: none;
        }

        .countdown-text {
            margin-top: 5px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="verification-container">
        <!-- Replace 'path-to-your-logo.png' with your actual logo path -->
        <img src="{{ asset('img/social-pension-logo.png') }}" alt="Logo">
        <h2>OTP Verification</h2>
        <!-- Laravel Session Status and Error Messages -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->has('otp'))
            <div class="alert alert-danger">
                {{ $errors->first('otp') }}
            </div>
        @endif

        <!-- Verify OTP Form -->
        <form action="{{ route('staff.otp.verify') }}" method="POST">
            @csrf
            <input type="text" name="otp" id="otp" class="form-control" placeholder="Verification Code"
                required>
            <button type="submit" class="btn btn-primary">Verify Now</button>
        </form>

        <!-- Resend OTP Section -->
        <form action="{{ route('staff.otp.send') }}" method="POST" id="resend-otp-form">
            @csrf
            <button type="submit" class="resend-link" id="resend-otp-link">Resend OTP</button>
        </form>
        <div id="countdown" class="countdown-text"></div>

        <!-- Optional JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const resendOtpLink = document.getElementById('resend-otp-link');
                const countdownEl = document.getElementById('countdown');

                let remainingTime = 60; // Countdown duration in seconds

                function startCountdown() {
                    resendOtpLink.classList.add('disabled');
                    countdownEl.textContent = `Send OTP again after ${remainingTime} seconds`;

                    const countdownInterval = setInterval(() => {
                        remainingTime--;
                        countdownEl.textContent = `Send OTP again after ${remainingTime} seconds`;

                        if (remainingTime <= 0) {
                            clearInterval(countdownInterval);
                            resendOtpLink.classList.remove('disabled');
                            countdownEl.textContent = '';
                            remainingTime = 60; // Reset the countdown
                        }
                    }, 1000);
                }

                resendOtpLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (!resendOtpLink.classList.contains('disabled')) {
                        // Trigger OTP resend (you can send the AJAX request here)
                        startCountdown();
                    }
                });

                startCountdown(); // Start the countdown on page load if needed
            });
        </script>
</body>
