<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
body {
    font-family: 'Arial', sans-serif;
    background: url('{{ asset('img/background.jpg') }}') no-repeat center center fixed;
    background-size: 70%;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden; 
    position: relative;
    z-index: 1;
}

.form-container {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 8px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    padding: 15px 30px;
    width: 450px;
    max-width: 90%;
    position: relative;
    text-align: center;
    margin: 20px auto; 
    z-index: 10; 
}

.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: #000;
}

.form-images {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;
    gap: 3px; 
}

.form-logo.dswd-logo {
    max-width: 180px; 
    height: auto; 
}

.form-logo.bagong-pilipinas {
    max-width: 70px; 
    height: auto; 
}

.form-logo.social-pension {
    max-width: 80px; 
    height: auto; 
}

h2 {
    text-align: center;
    margin-bottom: 15px;
    font-weight: 700;
    color: #333;
    font-size: 1.2rem; 
}

.form-section-title {
    margin-bottom: 10px;
    font-weight: bold; 
    color: #555;
    font-size: 1rem;
    text-align: left; 
}

.form-section {
    margin-bottom: 20px;
}

.input-group {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    margin-bottom: 20px;
}

.input-group input,
.input-group select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    width: 100%;
    box-sizing: border-box;
    transition: border-color 0.3s ease, box-shadow 0.3s ease; 
}

.input-group input:focus,
.input-group select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); 
    outline: none; 
}

#profile_picture:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}

.input-group input:hover,
.input-group select:hover,
#profile_picture:hover {
    border-color: #0056b3; 
}

.register-button {
    display: block;
    width: 40%;
    padding: 8px;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    color: #fff;
    font-size: 14px;
    cursor: pointer;
    text-align: center;
    transition: background-color 0.3s ease;
    margin: 10px auto; 
}

.register-button:hover {
    background-color: #0056b3;
}


body::before {
    content: '';
    position: absolute;
    top: -80px; /* Move the background further up */
    left: -80px; /* Move the background further left */
    width: calc(100% + 160px); /* Increase width beyond the screen */
    height: calc(100% + 160px); /* Increase height beyond the screen */
    background: url('{{ asset('img/backgroundborder.png') }}') no-repeat center center;
    background-size: cover;
    z-index: 0;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
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
    </style>

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

    form.addEventListener('submit', function(event) {
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
    
    document.querySelector('.close-button').addEventListener('click', confirmClose);

    function confirmClose() {
        const userConfirmed = confirm("Are you sure you want to close the form?");
        if (userConfirmed) {
            window.close();
            if (window.close) {
                window.location.href = '/';
            }
        }
    }
});

    </script>
</head>
<body>
<div class="background-border"></div>
    <div class="container">
    <div class="form-container">
        <button type="button" class="close-button" onclick="confirmClose()">×</button>
        <div class="form-images text-center">
    <img src="{{ asset('img/DSWDColored.png') }}" alt="DSWD Logo" class="form-logo dswd-logo">
    <img src="{{ asset('img/BagongPilipinas.png') }}" alt="Bagong Pilipinas" class="form-logo bagong-pilipinas">
    <img src="{{ asset('img/social-pension-logo.png') }}" alt="Social Pension Logo" class="form-logo social-pension">
</div>



        <h2 class="form-title">Staff Registration</h2>

        <form method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
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
                </div>

                <div class="input-group">
                    <input type="file" id="profile_picture" name="profile_picture" required>
                </div>
            </div>

            <button type="submit" class="register-button">Register</button>
        </form>
    </div>
</body>