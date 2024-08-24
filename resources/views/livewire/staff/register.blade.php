<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            position: relative;
        }

        .floating-background {
            background: url('{{ asset('img/back.jpg') }}') no-repeat center center;
            background-size: cover;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            transform: translate(-50%, -50%);
            z-index: -1;
            opacity: 0.8;
        }


        .form-container {
            position: relative;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 1.5rem;
            padding-top: 2.5rem;
            border: 3px solid rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 550px;
            margin: 0 auto;
            height: auto;
            backdrop-filter: blur(5px);
        }

        .close-button {
            position: absolute;
            top: 8px;
            right: 8px;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #000;
            cursor: pointer;
            font-weight: bold;
            line-height: 1;
        }

        .close-button:hover {
            color: #ff0000;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 0.75rem;
        }

        .form-section-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .form-section {
            margin-bottom: 0.5rem;
        }

        .form-group {
            margin-bottom: 0.25rem;
        }

        .form-control {
            padding: 0.25rem 0.5rem;
            margin-bottom: 0.25rem;
            font-size: 0.85rem;
        }

        .row {
            margin-left: -2px;
            margin-right: -2px;
        }

        .col-md-4,
        .col-md-6 {
            padding-left: 2px;
            padding-right: 2px;
        }

        .d-flex.justify-content-center.mb-4 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .d-flex.justify-content-center.mb-4 img {
            margin-right: 10px;
        }

        .d-flex.justify-content-center.mb-4 img:last-child {
            margin-right: 0;
        }

        .submit-button {
            padding: 0.25rem 0.5rem;
            background-color: #3b82f6;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 30%;
            font-size: 0.75rem;
            display: block;
            margin: 1.5rem auto;
            text-align: center;
        }

        .submit-button:hover {
            background-color: #2563eb;
        }

        .submit-button:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }


        .form-control {
            font-size: 0.95rem;
            padding: 0.35rem 0.75rem;
            margin-bottom: 0.75rem;
        }

        .form-container .close {
            position: absolute;
            top: 1.5rem;
            right: 1rem;
            font-size: 1.25rem;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButton = document.getElementById('close-button');

            closeButton.addEventListener('click', function() {
                const confirmClose = confirm(
                    'Are you sure you want to close this page? Any unsaved changes will be lost.');

                if (confirmClose) {
                    if (window.history.length > 1) {
                        window.history.back();
                    } else {
                        window.location.href = '/';
                    }
                }
            });

            const birthdateInput = document.getElementById('birthday');
            const ageInput = document.getElementById('age');
            const form = document.querySelector('form');
            const employeeIdInput = document.getElementById('employee_id');
            const emailInput = document.getElementById('email');

            birthdateInput.addEventListener('change', function() {
                const birthdate = new Date(birthdateInput.value);
                const today = new Date();
                let age = today.getFullYear() - birthdate.getFullYear();
                const monthDiff = today.getMonth() - birthdate.getMonth();
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
                    age--;
                }
                ageInput.value = age;
            });

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('password_confirmation').value;

                if (password !== confirmPassword) {
                    alert('Passwords do not match.');
                    return;
                }

                checkEmailExists(emailInput.value).then(emailExists => {
                    if (emailExists) {
                        alert('Email already exists.');
                    } else {
                        checkEmployeeIdExists(employeeIdInput.value).then(employeeExists => {
                            if (employeeExists) {
                                alert('Employee ID already exists.');
                            } else {
                                form.submit();
                            }
                        });
                    }
                });
            });

            function checkEmployeeIdExists(employeeId) {
                return $.ajax({
                    url: '/check-employee-id',
                    method: 'POST',
                    data: {
                        employee_id: employeeId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json'
                }).then(response => {
                    return response.exists;
                }).catch(error => {
                    console.error('Error checking employee ID:', error);
                    return false;
                });
            }

            function checkEmailExists(email) {
                return $.ajax({
                    url: '/check-email',
                    method: 'POST',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json'
                }).then(response => {
                    return response.exists;
                }).catch(error => {
                    console.error('Error checking email:', error);
                    return false;
                });
            }
        });
    </script>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="floating-background"></div>
    <div class="container">
        <div class="form-container">
            <form method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-center mb-4">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <img src="{{ asset('img/DSWDColored.png') }}" alt="DSWD Logo" class="img-fluid"
                        style="max-height: 60px;">
                    <img src="{{ asset('img/BagongPilipinas.png') }}" alt="Bagong Pilipinas Logo" class="img-fluid"
                        style="max-height: 80px;">
                    <img src="{{ asset('img/social-pension-logo.png') }}" alt="Social Pension Logo" class="img-fluid"
                        style="max-height: 80px;">
                </div>
                <h2 class="form-title">Staff Registration</h2>
                <!-- Personal Information Section -->
                <div class="form-section">
                    <h6 class="form-section-title">Personal Information</h6>
                    <div class="row">
                        <div class="col-md-4 mb-2 form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" id="lastname" name="lastname" maxlength="15" class="form-control"
                                required>
                        </div>
                        <div class="col-md-4 mb-2 form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" id="firstname" name="firstname" maxlength="15" class="form-control"
                                required>
                        </div>
                        <div class="col-md-4 mb-2 form-group">
                            <label for="middlename">Middlename</label>
                            <input type="text" id="middlename" name="middlename" maxlength="15" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2 form-group">
                            <label for="name_extension">Name Extension</label>
                            <select id="name_extension" name="name_extension" class="form-control" required>
                                <option value="">Choose...</option>
                                <option value="Jr.">Jr.</option>
                                <option value="Sr.">Sr.</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                                <option value="IX">IX</option>
                                <option value="X">X</option>
                                <option value="N/A">N/A</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2 form-group">
                            <label for="sex">Sex</label>
                            <select id="sex" name="sex" class="form-control" required>
                                <option value="">Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Prefer not to say">Prefer not to say</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2 form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" id="birthday" name="birthday" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-2 form-group">
                            <label for="age">Age</label>
                            <input type="number" id="age" name="age" class="form-control" required readonly>
                        </div>
                        <div class="col-md-4 mb-2 form-group">
                            <label for="marital_status">Marital Status</label>
                            <select id="marital_status" name="marital_status" class="form-control" required>
                                <option value="">Choose...</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2 form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" id="contact_number" name="contact_number" class="form-control"
                                maxlength="13" required pattern="\+639[0-9]{9}"
                                title="Please enter a valid PH contact number starting with +63"
                                onfocus="prependCountryCode()" oninput="enforceCountryCode()">
                            <div class="invalid-feedback">
                                Please enter a valid PH contact number starting with +63 (e.g., +639485292540).
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" maxlength="50" class="form-control"
                            required>
                    </div>

                    <!-- Employee Information Section -->
                    <div class="form-section">
                        <h6 class="form-section-title">Employee Information</h6>
                        <div class="row">
                            <div class="col-md-4 mb-2 form-group">
                                <label for="employee_id">Employee ID</label>
                                <input type="text" id="employee_id" name="employee_id" maxlength="10"
                                    class="form-control" required pattern="[0-9\-]+"
                                    title="Please enter a valid Employee ID (numbers and hyphens only)">
                                <div class="invalid-feedback">
                                    Please enter a valid Employee ID (numbers and hyphens only).
                                </div>
                            </div>
                            <div class="col-md-4 mb-2 form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" maxlength="25"
                                    class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-2 form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required
                                    minlength="8" maxlength="8">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2 form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" required minlength="8" maxlength="8">
                        </div>
                        <div class="col-md-6 mb-2 form-group">
                            <label for="assigned_province">Assigned Province</label>
                            <select id="assigned_province" name="assigned_province" class="form-control" required>
                                <option value="">Choose...</option>
                                <option value="Davao City">Davao City</option>
                                <option value="Davao del Sur">Davao del Sur</option>
                                <option value="Davao del Norte">Davao del Norte</option>
                                <option value="Davao de Oro">Davao de Oro</option>
                                <option value="Davao Oriental">Davao Oriental</option>
                                <option value="Davao Occidental">Davao Occidental</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 form-group">
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" id="profile_picture" name="profile_picture" class="form-control"
                            required>
                    </div>
                </div>
                <button type="submit" class="submit-button">Register</button>
            </form>
        </div>
    </div>
</body>
