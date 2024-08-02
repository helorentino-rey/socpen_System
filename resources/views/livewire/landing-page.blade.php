<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
        }
        .container {
            text-align: center;
            margin-top: 20%;
        }
        .btn-admin {
            background-color: #1C4CB1; /* DSWD Blue */
            color: white;
        }
        .btn-staff {
            background-color: #FF0000; /* DSWD Red */
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <h1>Landing Page</h1>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.login') }}" class="btn btn-admin btn-lg mx-2">Admin</a>
            <a href="{{ route('staff.login') }}" class="btn btn-staff btn-lg mx-2">Staff</a>
        </div>
    </div>

    <button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button>

<button type="button" class="btn btn-link">Link</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
