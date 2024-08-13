@extends('layouts.superadmin')

@section('title', 'Approved Staff')
@section('content')
    <h1>Approved Staff</h1>
    <br>
    <br>
    <!-- Search Beneficiaries content -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Staff Name</th>
                <th>Assigned Province</th>
                <th>Status</th>
                <th>Action</th>
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
                                <button type="submit" class="btn btn-sm btn-primary">Approve</button>
                            @else
                                <button type="submit" class="btn btn-sm btn-warning">Deactivate</button>
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
                    <h5 class="modal-title" id="staffDetailsModalLabel">Staff Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img id="staff-image" src="" alt="Staff Image" class="img-fluid"
                            style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="text-left">
                        <p><strong>Last Name:</strong> <span id="staff-lastname"></span></p>
                        <p><strong>First Name:</strong> <span id="staff-firstname"></span></p>
                        <p><strong>Middle Name:</strong> <span id="staff-middlename"></span></p>
                        <p><strong>Name Extension:</strong> <span id="staff-name_extension"></span></p>
                        <p><strong>Sex:</strong> <span id="staff-sex"></span></p>
                        <p><strong>Birthday:</strong> <span id="staff-birthday"></span></p>
                        <p><strong>Age:</strong> <span id="staff-age"></span></p>
                        <p><strong>Marital Status:</strong> <span id="staff-marital_status"></span></p>
                        <p><strong>Contact Number:</strong> <span id="staff-contact_number"></span></p>
                        <p><strong>Address:</strong> <span id="staff-address"></span></p>
                        <p><strong>Employee ID:</strong> <span id="staff-employee_id"></span></p>
                        <p><strong>Email:</strong> <span id="staff-email"></span></p>
                        <p><strong>Assigned Province:</strong> <span id="staff-assigned_province"></span></p>
                        <p><strong>Status:</strong> <span id="staff-status"></span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showStaffDetails(id) {
            fetch(`/superadmin/staff/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('staff-image').src = data.image_url || 'default-image-url.jpg';
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
            event.preventDefault(); // Prevent the form from submitting immediately
            let message = status === 'pending' ? 'Are you sure you want to approve this staff?' :
                'Are you sure you want to deactivate this staff?';
            if (confirm(message)) {
                event.target.submit(); // Submit the form if the user confirms
            }
        }
    </script>
@endsection
