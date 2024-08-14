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
                <th>Password</th> <!-- Added Password Column -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->employee_id }}</td>
                    <td>{{ $admin->assigned_province }}</td>
                    <td>{{ Crypt::decrypt($admin->password) }}</td> <!-- Decrypted Password -->
                    <td class="table-actions">
                        <i class="bi bi-pencil-square" data-bs-toggle="modal"
                            data-bs-target="#editAdminModal-{{ $admin->id }}"></i>
                        <i class="bi bi-trash-fill" onclick="deleteAdmin({{ $admin->id }})"></i>
                        <i class="bi {{ $admin->is_active ? 'bi-check-circle' : 'bi-x-circle' }}"
                            onclick="toggleAdminStatus({{ $admin->id }})"></i>
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
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                            <h5 class="modal-title" id="editAdminModalLabel">Edit Admin</h5>
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
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
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
