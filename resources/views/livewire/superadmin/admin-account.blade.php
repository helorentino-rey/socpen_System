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
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Admin Name</th>
                <th>Employee ID</th>
                <th>Password</th>
                <th>Assigned Province</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td><img src="admin1.jpg" alt="Admin 1" width="50" height="50" class="rounded"></td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->employee_id }}</td>
                    <td>{{ $admin->password }}</td>
                    <td>{{ $admin->province }}</td>
                    <td class="table-actions">
                        <i class="bi bi-pencil-square" data-bs-toggle="modal"
                            data-bs-target="#editAdminModal-{{ $admin->id }}"></i>
                        <i class="bi bi-trash-fill" onclick="deleteAdmin({{ $admin->id }})"></i>
                        <i class="bi bi-check-circle" onclick="toggleAdminStatus({{ $admin->id }})"></i>
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
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Admin Modal -->
    @foreach ($admins as $admin)
        <div class="modal fade" id="editAdminModal-{{ $admin->id }}" tabindex="-1" aria-labelledby="editAdminModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('admin.edit', $admin->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAdminModalLabel">Edit Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Employee ID</label>
                                <input type="text" class="form-control" id="employee_id" name="employee_id"
                                    value="{{ $admin->employee_id }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function deleteAdmin(id) {
            if (confirm('Are you sure you want to delete this admin?')) {
                window.location.href = '/admin/delete/' + id;
            }
        }

        function toggleAdminStatus(id) {
            window.location.href = '/admin/toggle-status/' + id;
        }
    </script>
@endsection
