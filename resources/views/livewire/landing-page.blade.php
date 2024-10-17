<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        select:invalid {
            color: gray;
        }

        option[value=""][disabled] {
            display: none;
        }

        select:invalid option {
            color: gray;
        }

        .register-button {
            display: block;
            width: 30%;
            padding: 6px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
            margin: 30px auto 0 auto;
            margin-top: 15px;

        }

        .register-button:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            font-weight: 700;
            color: #333;
            font-size: 1rem;
        }

        .form-section-title {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
            font-size: 1rem;
            text-align: left;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .input-group input,
        .input-group select {
            padding: 6px;
            border: 1px solid #007bff;
            border-radius: 4px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .input-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 4px;
            margin-bottom: 8px;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.4);
            outline: none;
        }

        .input-group input:hover,
        .input-group select:hover,
        #profile_picture:hover {
            border-color: #0056b3;
        }

        #profile_picture:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.4);
            outline: none;
        }

        .modal-title-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .modal-title {
            margin: 0;
            /* Remove default margin */
            font-size: 2rem;
            /* Adjust font size if needed */
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        .modal-header {
            position: relative;
            text-align: center;
            /* Center align text in modal header */
            padding: 1rem;
        }

        .modal-dialog.modal-lg {
            max-width: 40%;
            /* Decrease width */
            margin: auto;
            margin-top: 5px;
        }

        .modal-content {
            padding: 15px;
            /* Decrease padding */
            border-radius: 8px;
        }

        .modal-body {
            padding: 10px;
        }

        .modal-header .btn-close {
            width: 26px;
            height: 26px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 2px solid blue;
            ;
        }

        .modal-header .btn-close::before {
            font-size: 14px;
            color: #000;
            line-height: 1;
            padding: 4px;
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
                    <h5 class="card-title text-center mb-4">Employee Login</h5>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form id="loginForm" method="POST" action="{{ route('new-login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" id="employee_id" name="employee_id" class="form-control"
                                maxlength="10" required pattern="[0-9\-]+"
                                title="Please enter a valid Employee ID (numbers and hyphens only)">
                            <div class="invalid-feedback">
                                Please enter a valid Employee ID (numbers and hyphens only).
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" minlength="8"
                                maxlength="15" required>
                                <input type="checkbox" id="showPassword"> Show Password
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <div id="emailHelp" class="form-text text-center mt-2">(For Staff only) Don't have an account yet?
                        <button type="button" class="btn btn-secondary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#registrationModal">Register</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Registration Form -->
        <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Logos at the top of the modal -->
                        <div class="modal-logos mb-3"></div>
                        <div class="modal-title-container">
                            <h5 class="modal-title" id="registrationModalLabel">Staff Registration</h5>
                        </div>
                        <button type="button" class="btn-close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="registerForm" method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Personal Information Section -->
                            <div class="form-section">
                                <h3 class="form-section-title">Personal Information</h3>
                                <div class="input-group">
                                    <input type="text" id="lastname" name="lastname" placeholder="Lastname" maxlength="15" required>
                                    <input type="text" id="firstname" name="firstname" placeholder="Firstname" maxlength="15" required>
                                    <input type="text" id="middlename" name="middlename" placeholder="Middlename" maxlength="15">
                                    <select id="name_extension" name="name_extension">
                                        <option value="">Name Extension</option>
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
                                <div class="input-group">
                                    <select id="sex" name="sex" required>
                                        <option value="">Sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Prefer not to say">Prefer not to say</option>
                                    </select>
                                    <input type="date" id="birthday" name="birthday" required>
                                    <input type="number" id="age" name="age" placeholder="Age" required readonly>
                                    <select id="marital_status" name="marital_status" required>
                                        <option value="">Marital Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="address" name="address" placeholder="Address" maxlength="50" required>
                                    <input type="tel" id="contact_number" name="contact_number" placeholder="Contact Number" maxlength="13" required
                                        pattern="\+639[0-9]{9}" title="Please enter a valid PH contact number starting with +63"
                                        onfocus="prependCountryCode()" oninput="enforceCountryCode()">
                                </div>
                            </div>
                            <!-- Employee Information Section -->
                            <div class="form-section">
                                <h3 class="form-section-title">Employee Information</h3>
                                <div class="input-group">
                                    <input type="text" id="employee_id" name="employee_id" placeholder="Employee ID" maxlength="10" required
                                        pattern="[0-9\-]+" title="Please enter a valid Employee ID (numbers and hyphens only)">
                                    <input type="email" id="email" name="email" placeholder="Email" maxlength="25" required>
                                    <input type="password" id="password" name="password" placeholder="Password" required minlength="8" maxlength="8">
                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required
                                        minlength="8" maxlength="8">
                                    <select id="assigned_province" name="assigned_province" required>
                                        <option value="">Assigned Province</option>
                                        <option value="Davao City">Davao City</option>
                                        <option value="Davao del Sur">Davao del Sur</option>
                                        <option value="Davao del Norte">Davao del Norte</option>
                                        <option value="Davao de Oro">Davao de Oro</option>
                                        <option value="Davao Oriental">Davao Oriental</option>
                                        <option value="Davao Occidental">Davao Occidental</option>
                                    </select>
                                    <input type="file" id="profile_picture" name="profile_picture" required>
                                </div>

                            </div>
                            <button type="submit" class="register-button">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
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

                loginForm.addEventListener('submit', function(event) {
                    // Perform login validation or any other necessary actions
                    // Example: event.preventDefault() to prevent submission
                });

                registerform.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent form submission until checks are done

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
                                    form.submit(); // Submit the form if all checks pass
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
                            _token: '{{ csrf_token() }}' // Include CSRF token for security
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
                            _token: '{{ csrf_token() }}' // Include CSRF token for security
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

            //Show Password
            document.addEventListener('DOMContentLoaded', function() {
        const showPasswordCheckbox = document.getElementById('showPassword');
        const passwordInput = document.getElementById('password');

        showPasswordCheckbox.addEventListener('change', function() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.btn-close').addEventListener('click', function(event) {
                    event.preventDefault();

                    const confirmation = confirm("Are you sure you want to close the form? Any unsaved changes will be lost.");

                    if (confirmation) {

                        const modal = bootstrap.Modal.getInstance(document.getElementById('registrationModal'));
                        modal.hide();
                    }

                });
            });
        </script>
</body>