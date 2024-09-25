@extends('layouts.superadmin')

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

    .card {
        border-left: 5px solid blue;
    }

    .table {
        font-family: 'Arial', sans-serif;
        font-size: 14px;
    }

    .form-control {
        font-size: 14px;
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

    .logos-container {
        display: flex;
        align-items: center;
        /* Ensures the logos are vertically aligned */
    }

    .heading-border {
        margin-right: 10px;
        /* Adds some space between the heading and logos */
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

    .custom-btn-sm {
        font-size: 14px;
        padding: 0.10rem 0.15rem;
        border-radius: 0.25rem;
    }
    /* For icon design */
    .icon-container {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        background-color: #f54242;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
        text-align: center;
        margin-top: 10px;
    }

    .icon-style {
        color: white;
        font-size: 2.5rem;
    }
    /* For modal content */
    .acm {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 1rem;
        margin:auto;
    }
    /* For close button */
    .custom-bton {
    background-color: transparent;
    border: 2px solid #4d4dff;
    color: #4d4dff;
}

.dlg {
    display: flex;
    align-items: center; 
    justify-content: center; 
    min-height: calc(100vh - 60px);
}
</style>
<div class="header-container">
    <h1 class="heading-border">Admin</h1>
    <div class="logos-container">
        <img src="{{ asset('img/DSWDColored.png') }}" alt="DSWD Logo" class="dswd-logo">
        <img src="{{ asset('img/social-pension-logo.png') }}" alt="Social Pension Logo" class="social-pension-logo">
    </div>
</div>

<!-- Display Success Message -->
@if (session('success'))
<div class="alert alert-success d-none" id="successMessage">
    {{ session('success') }}
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ session('success') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Main Content -->
<div id="main-content" class="col-mb-10 content">
    <button class="btn btn-primary float-end mb-3" data-bs-toggle="modal" data-bs-target="#addAdminModal">Add
        New</button>
</div>

<!-- Admins Table -->

<div class="my-5 px-4" style="font-family: 'Arial', sans-serif;">
    <div class="card shadow-sm p-4 rounded ">
        <table class="table table-borderless w-100">
            <thead class="border-bottom">
                <tr>
                    <th scope="col">Admin Name</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Assigned Province</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->employee_id }}</td>
                    <td>{{ str_replace(',', ', ', $admin->assigned_province) }}</td>
                    <td class="table-actions">
                        <i class="bi bi-pencil-square" data-bs-toggle="modal"
                            data-bs-target="#editAdminModal-{{ $admin->id }}"></i>
                        <i class="bi bi-trash-fill" onclick="deleteAdmin({{ $admin->id }})"></i>
                        <i class="bi {{ $admin->is_active ? 'bi-check-circle' : 'bi-x-circle' }}"
                            onclick="toggleAdminStatus({{ $admin->id }}, {{ $admin->is_active ? 'true' : 'false' }})"></i>
                        <i class="bi bi-key" data-bs-toggle="modal"
                            data-bs-target="#resetPasswordModal-{{ $admin->id }}"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add Admin Modal -->
        <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('admin.create') }}" method="POST" class="province-form">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title custom-btn-sm" id="addAdminModalLabel">Add New Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Admin Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Employee ID</label>
                                <input type="text" class="form-control" id="employee_id" name="employee_id" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Assigned Province</label>
                                <div>
                                    <input type="checkbox" id="davao_city" name="province[]" value="Davao City" required>
                                    <label for="davao_city">Davao City</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="davao_del_sur" name="province[]" value="Davao del Sur" required>
                                    <label for="davao_del_sur">Davao del Sur</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="davao_del_norte" name="province[]" value="Davao del Norte" required>
                                    <label for="davao_del_norte">Davao del Norte</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="davao_de_oro" name="province[]" value="Davao de Oro" required>
                                    <label for="davao_de_oro">Davao de Oro</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="davao_oriental" name="province[]" value="Davao Oriental" required>
                                    <label for="davao_oriental">Davao Oriental</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="davao_occidental" name="province[]" value="Davao Occidental" required>
                                    <label for="davao_occidental">Davao Occidental</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Admin Modal -->
        @foreach ($admins as $admin)
        <div class="modal fade" id="editAdminModal-{{ $admin->id }}" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('admin.edit', $admin->id) }}" method="POST" class="province-form">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAdminModalLabel">Edit Admin Info</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Admin Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Employee ID</label>
                                <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ $admin->employee_id }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Assigned Province</label>
                                <div>
                                    <input type="checkbox" id="davao_city_{{ $admin->id }}" name="province[]" value="Davao City" {{ in_array('Davao City', explode(',', $admin->assigned_province)) ? 'checked' : '' }}>
                                    <label for="davao_city_{{ $admin->id }}">Davao City</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="davao_del_sur_{{ $admin->id }}" name="province[]" value="Davao del Sur" {{ in_array('Davao del Sur', explode(',', $admin->assigned_province)) ? 'checked' : '' }}>
                                    <label for="davao_del_sur_{{ $admin->id }}">Davao del Sur</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="davao_del_norte_{{ $admin->id }}" name="province[]" value="Davao del Norte" {{ in_array('Davao del Norte', explode(',', $admin->assigned_province)) ? 'checked' : '' }}>
                                    <label for="davao_del_norte_{{ $admin->id }}">Davao del Norte</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="davao_de_oro_{{ $admin->id }}" name="province[]" value="Davao de Oro" {{ in_array('Davao de Oro', explode(',', $admin->assigned_province)) ? 'checked' : '' }}>
                                    <label for="davao_de_oro_{{ $admin->id }}">Davao de Oro</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="davao_oriental_{{ $admin->id }}" name="province[]" value="Davao Oriental" {{ in_array('Davao Oriental', explode(',', $admin->assigned_province)) ? 'checked' : '' }}>
                                    <label for="davao_oriental_{{ $admin->id }}">Davao Oriental</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="davao_occidental_{{ $admin->id }}" name="province[]" value="Davao Occidental" {{ in_array('Davao Occidental', explode(',', $admin->assigned_province)) ? 'checked' : '' }}>
                                    <label for="davao_occidental_{{ $admin->id }}">Davao Occidental</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach


        <!-- Reset Password Modal -->
        @foreach ($admins as $admin)
        <div class="modal fade" id="resetPasswordModal-{{ $admin->id }}" tabindex="-1"
            aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('admin.resetPassword', $admin->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="new_password"
                                    name="new_password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Delete Admin Confirmation Modal -->
        <div class="modal fade" id="deleteAdminModal" tabindex="-1" aria-labelledby="deleteAdminModalLabel"
            aria-hidden="true">
            <div class="modal-dialog dlg">
                <div class="modal-content acm">
                <div class="icon-container">
                        <i class="bi bi-question-lg icon-style"></i>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this admin?
                    </div>
                    <div class="modal-footer">
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('GET')
                            <button type="button" class="btn btn-secondary custom-bton" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activate/Deactivate Admin Confirmation Modal -->
        <div class="modal fade" id="toggleAdminStatusModal" tabindex="-1"
            aria-labelledby="toggleAdminStatusModalLabel" aria-hidden="true">
            <div class="modal-dialog dlg">
                <div class="modal-content acm">
                    <div class="icon-container">
                        <i class="bi bi-question-lg icon-style"></i>
                    </div>
                    <div class="modal-body" style="margin-top:1px;">
                        <!-- Dynamic content will be injected here -->
                        <p id="toggleAdminStatusMessage"></p>
                    </div>
                    <div class="modal-footer" style="margin-top:-5px;">
                        <form id="toggleStatusForm" method="POST" action="">
                            @csrf
                            @method('PUT')
                            <button type="button" class="btn btn-secondary custom-bton" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Show success message
            document.addEventListener('DOMContentLoaded', function() {
                var successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();
                }
            });

            function deleteAdmin(id) {
                var form = document.getElementById('deleteForm');
                form.action = '/admin/delete/' + id;
                var deleteModalElement = document.getElementById('deleteAdminModal');
                if (deleteModalElement) {
                    var deleteModal = new bootstrap.Modal(deleteModalElement);
                    deleteModal.show();
                } else {
                    console.error('Delete Admin Modal element not found');
                }
            }

            function toggleAdminStatus(id, isActive) {
                // Update form action URL
                var form = document.getElementById('toggleStatusForm');
                form.action = '/admin/toggle-status/' + id;

                // Update the modal message dynamically
                var messageElement = document.getElementById('toggleAdminStatusMessage');
                if (messageElement) {
                    messageElement.textContent = isActive ?
                        'Are you sure you want to deactivate this admin?' :
                        'Are you sure you want to activate this admin?';
                }

                // Show the modal
                var toggleModalElement = document.getElementById('toggleAdminStatusModal');
                if (toggleModalElement) {
                    var toggleModal = new bootstrap.Modal(toggleModalElement);
                    toggleModal.show();
                } else {
                    console.error('Toggle Admin Status Modal element not found');
                }
            }
            //Checkbox
            document.addEventListener('DOMContentLoaded', function() {
                const forms = document.querySelectorAll('.province-form');
                forms.forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        const checkboxes = form.querySelectorAll('input[name="province[]"]');
                        let isChecked = false;
                        checkboxes.forEach(function(checkbox) {
                            if (checkbox.checked) {
                                isChecked = true;
                            }
                        });
                        if (!isChecked) {
                            event.preventDefault();
                            alert('Please select at least one province.');
                        }
                    });
                });
            });
        </script>
        @endsection