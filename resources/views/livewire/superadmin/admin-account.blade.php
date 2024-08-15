@extends('layouts.superadmin')

@section('title', 'Admin Account')
@section('content')
<h1>Admin Account</h1>

<!-- Display Success Message -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Main Content -->
<div id="main-content" class="col-md-10 content">
    <button class="btn btn-primary float-end mb-3" data-bs-toggle="modal" data-bs-target="#addAdminModal">Add New</button>
</div>

<!-- Admins Table -->
<table class="table mt-3">
    <thead>
        <tr>
            <th>Admin Name</th>
            <th>Employee ID</th>
            <th>Assigned Province</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->employee_id }}</td>
                <td>{{ $admin->assigned_province }}</td>
                <td class="table-actions">
                    <i class="bi bi-pencil-square" data-bs-toggle="modal"
                        data-bs-target="#editAdminModal-{{ $admin->id }}"></i>
                    <i class="bi bi-trash-fill" onclick="deleteAdmin({{ $admin->id }})"></i>
                    <i class="bi {{ $admin->is_active ? 'bi-check-circle' : 'bi-x-circle' }}"
                        onclick="toggleAdminStatus({{ $admin->id }})"></i>
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
            <form action="{{ route('admin.create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Add New Admin</h5>
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
                        <label for="province" class="form-label">Assigned Province</label>
                        <select class="form-control" id="province" name="province" required>
                            <option value="">Select Province</option>
                            <option value="Davao City">Davao City</option>
                            <option value="Davao del Sur">Davao del Sur</option>
                            <option value="Davao del Norte">Davao del Norte</option>
                            <option value="Davao de Oro">Davao de Oro</option>
                            <option value="Davao Oriental">Davao Oriental</option>
                            <option value="Davao Occidental">Davao Occidental</option>
                        </select>
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
    <div class="modal fade" id="editAdminModal-{{ $admin->id }}" tabindex="-1"
        aria-labelledby="editAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.edit', $admin->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAdminModalLabel">Edit Admin Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Admin Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $admin->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id"
                                value="{{ $admin->employee_id }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="province" class="form-label">Assigned Province</label>
                            <select class="form-control" id="province" name="province" required>
                                <option value="Davao City"
                                    {{ $admin->assigned_province == 'Davao City' ? 'selected' : '' }}>
                                    Davao City</option>
                                <option value="Davao del Sur"
                                    {{ $admin->assigned_province == 'Davao del Sur' ? 'selected' : '' }}>Davao del Sur
                                </option>
                                <option value="Davao del Norte"
                                    {{ $admin->assigned_province == 'Davao del Norte' ? 'selected' : '' }}>Davao del
                                    Norte
                                </option>
                                <option value="Davao de Oro"
                                    {{ $admin->assigned_province == 'Davao de Oro' ? 'selected' : '' }}>Davao de Oro
                                </option>
                                <option value="Davao Oriental"
                                    {{ $admin->assigned_province == 'Davao Oriental' ? 'selected' : '' }}>Davao
                                    Oriental
                                </option>
                                <option value="Davao Occidental"
                                    {{ $admin->assigned_province == 'Davao Occidental' ? 'selected' : '' }}>Davao
                                    Occidental
                                </option>
                            </select>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAdminModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this admin?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('GET')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Activate/Deactivate Admin Confirmation Modal -->
<div class="modal fade" id="toggleAdminStatusModal" tabindex="-1" aria-labelledby="toggleAdminStatusModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="toggleAdminStatusModalLabel">Confirm Status Change</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to {{ $admin->is_active ? 'deactivate' : 'activate' }} this admin?
            </div>
            <div class="modal-footer">
                <form id="toggleStatusForm" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Admin Information Updated Successfully Modal -->
<div class="modal fade" id="updateSuccessModal" tabindex="-1" aria-labelledby="updateSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSuccessModalLabel">Update Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Admin information has been updated successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Password Updated Successfully Modal -->
<div class="modal fade" id="passwordUpdateSuccessModal" tabindex="-1" aria-labelledby="passwordUpdateSuccessModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordUpdateSuccessModalLabel">Password Update Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                The password has been updated successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <script>
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

        function toggleAdminStatus(id) {
            var form = document.getElementById('toggleStatusForm');
            form.action = '/admin/toggle-status/' + id;
            var toggleModalElement = document.getElementById('toggleAdminStatusModal');
            if (toggleModalElement) {
                var toggleModal = new bootstrap.Modal(toggleModalElement);
                toggleModal.show();
            } else {
                console.error('Toggle Admin Status Modal element not found');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                var successMessage = "{{ session('success') }}";
                if (successMessage.includes('deleted')) {
                    var deleteSuccessModalElement = document.getElementById('deleteSuccessModal');
                    if (deleteSuccessModalElement) {
                        var deleteSuccessModal = new bootstrap.Modal(deleteSuccessModalElement);
                        deleteSuccessModal.show();
                    } else {
                        console.error('Delete Success Modal element not found');
                    }
                } else if (successMessage.includes('activated')) {
                    var activateSuccessModalElement = document.getElementById('activateSuccessModal');
                    if (activateSuccessModalElement) {
                        var activateSuccessModal = new bootstrap.Modal(activateSuccessModalElement);
                        activateSuccessModal.show();
                    } else {
                        console.error('Activate Success Modal element not found');
                    }
                } else if (successMessage.includes('deactivated')) {
                    var deactivateSuccessModalElement = document.getElementById('deactivateSuccessModal');
                    if (deactivateSuccessModalElement) {
                        var deactivateSuccessModal = new bootstrap.Modal(deactivateSuccessModalElement);
                        deactivateSuccessModal.show();
                    } else {
                        console.error('Deactivate Success Modal element not found');
                    }
                } else {
                    var updateSuccessModalElement = document.getElementById('updateSuccessModal');
                    if (updateSuccessModalElement) {
                        var updateSuccessModal = new bootstrap.Modal(updateSuccessModalElement);
                        updateSuccessModal.show();
                    } else {
                        console.error('Update Success Modal element not found');
                    }
                }
            @endif
        });
    </script>
@endsection
