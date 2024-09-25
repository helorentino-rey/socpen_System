@extends('layouts.superadmin')

@section('title', 'Approved Staff')
@section('content')
<style>
        /* Search Bar */
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;

        }

        .beneficiary-status {
            margin-left: auto;
            padding-left: 10px;
            font-weight: bold;

        }

        /* Pagination */
        .pagination .page-link {
            font-size: 12px;
            /* Adjust the size as needed */
            padding: 0.25rem 0.5rem;
            /* Make the arrows smaller */
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            /* Your active link color */
            border-color: #007bff;
        }

        .pagination .page-link:hover {
            background-color: rgba(0, 86, 179, 0.1);
            /* Light blue background with transparency */
            border-color: #0056b3;
            /* Keep the border color */
        }

        .table {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
        }

        .form-control {
        font-size: 20px;
        padding: 5px;
        font-family: 'Arial', sans-serif;
        vertical-align: middle;
    }

    .form-group {
        margin-bottom: 5px;
        font-family: 'Arial', sans-serif;
    }

    .form-row>.col-md-3,
    .form-row>.col-md-2,
    .form-row>.col-md-6 {
        padding-right: 10px;
        padding-left: 10px;
        font-family: 'Arial', sans-serif;
    }

    .form-row>.col-md-1,
    .form-row>.col-md-4,
    .form-row>.col-md-5 {
        padding-right: 5px;
        padding-left: 5px;
        font-family: 'Arial', sans-serif;
    }

    .custom-form-row {
        display: flex;
        font-family: 'Arial', sans-serif;
    }

    .custom-form-row .form-control {
        height: 30px;
        font-size: 12px;
        border-radius: 5px;
        font-family: 'Arial', sans-serif;
        vertical-align: auto;
    }

.header-container {
    display: flex;
    align-items: center;
    justify-content: space-between; 
    border-bottom: 1.5px solid grey; 
    padding-bottom: -50px;
    margin-bottom: 0;
    margin-top: -30px;
}

.card{
            border-left: 5px solid blue;
        }

.logos-container {
    display: flex;
    align-items: center;
}

.heading-border {
    margin-right: 10px; 
}

.custom-btn-sm {
    font-size: 14px; 
    padding: 0.10rem 0.15rem; 
    border-radius: 0.25rem; 
}

.dswd-logo {
    height: 50px;
    margin-left: 10px;
}

.social-pension-logo {
    height: 100px;
    margin-left: 10px;
    margin-bottom: 9px;
}
</style>
<div class="header-container">
    <h1 class="heading-border">Approve Staff</h1>
    <div class="logos-container">
        <img src="{{ asset('img/DSWDColored.png') }}" alt="DSWD Logo" class="dswd-logo">
        <img src="{{ asset('img/social-pension-logo.png') }}" alt="Social Pension Logo" class="social-pension-logo">
    </div>
</div>

<br>
<br>
<!-- Search Beneficiaries content -->
<div class="my-5 px-4" style="font-family: 'Arial', sans-serif;">
<div class="card shadow-sm p-4 rounded">
<table class="table table-borderless w-100">
                <thead class="border-bottom">
                    <tr>
                        <th scope="col">Staff Name</th>
                        <th scope="col">Assigned Province</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($staff as $staffMember)
        <tr>
            <td onclick="showStaffDetails({{ $staffMember->id }})" style="cursor: pointer;">
                {{ $staffMember->lastname }}, {{ $staffMember->firstname }} {{ $staffMember->middlename }}
            </td>
            <td>{{ $staffMember->assigned_province }}</td>
            <td>
                <span class="badge {{ $staffMember->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                    {{ ucfirst($staffMember->status) }}
                </span>
            </td>
            <td>
                <form action="{{ route('superadmin.approveStaff', ['id' => $staffMember->id]) }}" method="POST"
                    style="display: inline;" onsubmit="return confirmAction(event, '{{ $staffMember->status }}')">
                    @csrf
                    @method('PATCH')
                    @if ($staffMember->status == 'pending')
                    <button type="submit" class="btn btn-sm btn-primary custom-btn-sm">Approve</button>
                    @else
                    <button type="submit" class="btn btn-sm btn-warning custom-btn-sm">Deactivate</button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
                </tbody>
            </table>

<!-- Modal -->
<div class="modal fade" id="staffDetailsModal" tabindex="-1" aria-labelledby="staffDetailsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staffDetailsModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
                <div class="text-center mb-3">
                    <img id="staff-image" src="/path/to/default-image.jpg" alt="Staff Image" class="img-fluid"
                        style="width: 150px; height: 150px; object-fit: cover; border: 1.5px solid #1C4CB1;">
                </div>
                <div class="form-group">
                <label class="label"><strong>Staff Information</strong></label>
                <div class="form-row custom-form-row">
                    <div class="col-md-6 mb-3" style="border-top: 1px solid;">
                        <label class="ltitle" for="last_name"><strong style="font-size: 14px;">Last Name:</strong></label>
                       <span class="form-control"  id="staff-lastname"></span>
                    </div>
                    <div class="col-md-6 mb-3" style="border-top: 1px solid;">
                        <label class="ltitle" for="first_name"><strong style="font-size: 14px;">First Name:</strong></label>
                         <span class="form-control"  id="staff-firstname"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <div class="form-row custom-form-row">
                    <div class="col-md-6 mb-3">
                        <label class="ltitle" for="middle_name"><strong style="font-size: 14px;">Middle Name:</strong> </label>
                         <span class="form-control" id="staff-middlename"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="ltitle" for="name_extension"><strong style="font-size: 14px;">Name Extension:</strong></label>
                         <span class="form-control" id="staff-name_extension"></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row custom-form-row">
                    <div class="col-md-6 mb-3">
                        <label class="ltitle" for="last_name"><strong style="font-size: 14px;">Sex:</strong></label>
                        <span class="form-control" id="staff-sex"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="ltitle" for="first_name"><strong style="font-size: 14px;">Birthday:</strong></label>
                         <span class="form-control" id="staff-birthday"></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row custom-form-row">
                    <div class="col-md-6 mb-3">
                        <label class="ltitle" for="middle_name"><strong style="font-size: 14px;">Age:</strong> </label>
                        <span class="form-control" style="font-size: 14px;" id="staff-age"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="ltitle" for="name_extension"><strong style="font-size: 14px;">Marital Status:</strong></label>
                     <span class="form-control" id="staff-marital_status"></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row custom-form-row">
                    <div class="col-md-6 mb-3">
                        <label class="ltitle" for="last_name"><strong style="font-size: 14px;">Contact Number:</strong></label>
                         <span class="form-control" id="staff-contact_number"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="ltitle" for="first_name"> <strong style="font-size: 14px;">Address:</strong></label>
                        <span class="form-control" id="staff-address"></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
            <label class="label"><strong>Employee Information</strong></label>
                <div class="form-row custom-form-row">
                <div class="col-md-6 mb-3" style="border-top: 1px solid;">
                        <label class="ltitle" for="middle_name"><strong style="font-size: 14px;">Employee ID:</strong> </label>
                         <span class="form-control" id="staff-employee_id"></span>
                    </div>
                    <div class="col-md-6 mb-3" style="border-top: 1px solid;">
                        <label class="ltitle" for="name_extension"><strong style="font-size: 14px;">Email:</strong></label>
                         <span class="form-control" id="staff-email"></span>
                    </div>
                </div>
            </div>

            <div class="form-group">
            <div class="form-row custom-form-row">
                    <div class="col-md-6 mb-3">
                        <label class="ltitle" for="last_name"><strong style="font-size: 14px;">Assigned Province:</strong> </label>
                        <span class="form-control" id="staff-assigned_province"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="ltitle" for="first_name"><strong style="font-size: 14px;">Status:</strong></label>
                         <span class="form-control" id="staff-status"></span>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="confirmationMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmActionButton">Confirm</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>



<script>
    function showStaffDetails(id) {
        fetch(`/superadmin/staff/${id}`)
            .then(response => response.json())
            .then(data => {
                const imageUrl = data.image_url ? data.image_url : '/path/to/default-image.jpg';
                document.getElementById('staff-image').src = imageUrl;
                document.getElementById('staff-lastname').innerText = data.lastname;
                document.getElementById('staff-firstname').innerText = data.firstname;
                document.getElementById('staff-middlename').innerText = data.middlename || 'N/A';
                document.getElementById('staff-name_extension').innerText = data.name_extension || 'N/A';
                document.getElementById('staff-sex').innerText = data.sex;

                // Format the birthday
                const birthday = new Date(data.birthday);
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                document.getElementById('staff-birthday').innerText = birthday.toLocaleDateString('en-US', options);

                document.getElementById('staff-age').innerText = data.age;
                document.getElementById('staff-marital_status').innerText = data.marital_status;
                document.getElementById('staff-contact_number').innerText = data.contact_number;
                document.getElementById('staff-address').innerText = data.address;
                document.getElementById('staff-employee_id').innerText = data.employee_id;
                document.getElementById('staff-email').innerText = data.email;
                document.getElementById('staff-assigned_province').innerText = data.assigned_province;
                document.getElementById('staff-status').innerText = data.status;

                // Show the modal
                var myModal = new bootstrap.Modal(document.getElementById('staffDetailsModal'));
                myModal.show();
            });
    }

    function confirmAction(event, status) {
        event.preventDefault();

        let message = status === 'pending' ? 'Are you sure you want to approve this staff?' :
            'Are you sure you want to deactivate this staff?';

        document.getElementById('confirmationMessage').textContent = message;
        const formToSubmit = event.target;
        var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        confirmationModal.show();

        document.getElementById('confirmActionButton').onclick = function() {
            formToSubmit.submit();
            confirmationModal.hide();
        };
    }
</script>
@endsection