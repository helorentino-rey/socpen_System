@extends('layouts.staff')
@section('content')

<!-- Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="alertModalLabel">Update Successful</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @elseif (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Bootstrap JavaScript and its dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  
  <!-- Script to automatically show the modal if there is a session message -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var successMessage = '{{ session('success') }}';
      var errorMessage = '{{ session('error') }}';
  
      if (successMessage || errorMessage) {
        var alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
        alertModal.show();
      }
    });
  </script>
  

    <h2 class="form-title text-center">Staff Information</h2>
    <form id="staffForm">
        <div class="form-section">
          
            <div class="row">
                <div class="mb-3 text-center">
                    <div class="mb-3 form-group">
                        <label></label><br>
                        <img id="staff-image" src="{{ $profilePicUrl }}" alt="Profile Picture" class="img-thumbnail" width="150">
                    </div>
                    <div class="mb-3 text-center">
                        <button id="btn-updateInfo" type="button" class="btn btn-primary">Update Information</button>
                        <button id="btn-changePass" type="button" class="btn btn-primary">Change Password</button>
                    </div>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-lastname">Lastname</label>
                    <input type="text" id="staff-lastname" name="lastname" class="form-control" value="{{ $lastName }}" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-firstname">Firstname</label>
                    <input type="text" id="staff-firstname" name="firstname" class="form-control" value="{{ $firstName }}" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-middlename">Middlename</label>
                    <input type="text" id="staff-middlename" name="middlename" class="form-control" value="{{ $middleName }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-name_extension">Name Extension</label>
                    <input type="text" id="staff-name_extension" name="name_extension" class="form-control" value="{{ $nameExtension }}" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-sex">Sex</label>
                    <input type="text" id="staff-sex" name="sex" class="form-control" value="{{ $sex }}" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-birthday">Birthday</label>
                    <input type="date" id="staff-birthday" name="birthday" class="form-control" value="{{ $birthday }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-age">Age</label>
                    <input type="number" id="staff-age" name="age" class="form-control" value="{{ $age }}" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-marital_status">Marital Status</label>
                    <input type="text" id="staff-marital_status" name="marital_status" class="form-control" value="{{ $maritalStatus }}" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-contact_number">Contact Number</label>
                    <input type="text" id="staff-contact_number" name="contact_number" class="form-control" value="{{ $contactNumber }}" readonly>
                </div>
            </div>
            <div class="mb-3 form-group">
                <label for="staff-address">Address</label>
                <input type="text" id="staff-address" name="address" class="form-control" value="{{ $address }}" readonly>
            </div>
        </div>

        <div class="form-section">
            <h6 class="form-section-title">Employee Information</h6>
            <div class="row">
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-employee_id">Employee ID</label>
                    <input type="text" id="staff-employee_id" name="employee_id" class="form-control" value="{{ $employeeId }}" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-email">Email</label>
                    <input type="email" id="staff-email" name="email" class="form-control" value="{{ $email }}" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-assigned_province">Assigned Province</label>
                    <input type="text" id="staff-assigned_province" name="assigned_province" class="form-control" value="{{ $assignedProvince }}" readonly>
                </div>
            </div>
        </div>
    </form>
</div>


<!----------->
<!-- Modal (UPDATE INFORMATION) -->
<!----------->
<div class="modal fade" id="updateInfoModal" tabindex="-1" aria-labelledby="updateInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50rem;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateInfoModalLabel">Update Information</h5>
            </div>
            <div class="modal-body">
                <form id="updateStaffForm" action="{{ route('staff.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="update-lastname" class="form-label">Lastname</label>
                            <input type="text" class="form-control" id="update-lastname" name="lastname" maxlength="20" value="{{ $lastName }}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="update-firstname" class="form-label">Firstname</label>
                            <input type="text" class="form-control" id="update-firstname" name="firstname" maxlength="25" value="{{ $firstName }}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="update-middlename" class="form-label">Middlename</label>
                            <input type="text" class="form-control" id="update-middlename" name="middlename" maxlength="20" value="{{ $middleName }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="update-name_extension" class="form-label">Name Extension</label>
                            <input type="text" class="form-control" id="update-name_extension" name="name_extension" value="{{ $nameExtension }}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="update-sex" class="form-label">Sex</label>
                            <input type="text" class="form-control" id="update-sex" name="sex" value="{{ $sex }}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="update-birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="update-birthday" name="birthday" value="{{ $birthday }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="update-age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="update-age" name="age" value="{{ $age }}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="update-marital_status" class="form-label">Marital Status</label>
                            <input type="text" class="form-control" id="update-marital_status" name="marital_status" value="{{ $maritalStatus }}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="update-contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="update-contact_number" name="contact_number" maxlength="13" value="{{ $contactNumber }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="update-address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="update-address" name="address" maxlength="50" value="{{ $address }}">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="update-employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="update-employee_id" name="employee_id" maxlength="10" value="{{ $employeeId }}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="update-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="update-email" name="email" maxlength="50" value="{{ $email }}">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="update-assigned_province">Assigned Province</label>
                            <select class="form-control form-select" id="update-assigned_province" name="assigned_province">
                                <option value="{{ $assignedProvince }}">{{ $assignedProvince }}</option>
                                <option value="Davao City">Davao City</option>
                                <option value="Davao del Sur">Davao del Sur</option>
                                <option value="Davao del Norte">Davao del Norte</option>
                                <option value="Davao de Oro">Davao de Oro</option>
                                <option value="Davao Oriental">Davao Oriental</option>
                                <option value="Davao Occidental">Davao Occidental</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="saveUpdateBtn">Save</button>
            </div>
        </div>
    </div>
</div>



<!----------->
<!-- Modal (CHANGE PASSWORD) -->
<!----------->
<div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="changePassModalLabel" aria-hidden="true" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePassModalLabel">Change Password</h5>
            </div>
            <div class="modal-body">
                <form id="changePassForm" action="{{ route('staff.updatePassword') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="current-password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current-password" name="current_password" maxlength="15" required>
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new-password" name="new_password" maxlength="15" required>
                        <div id="password-error" class="text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
                        <div id="confirm-password-error" class="text-danger"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="saveChangePassBtn">Save</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    // Show modal for updating information
    document.getElementById('btn-updateInfo').addEventListener('click', function() {
        var updateInfoModal = new bootstrap.Modal(document.getElementById('updateInfoModal'));
        updateInfoModal.show();
    });

    // Submit form for updating information
    document.getElementById('saveUpdateBtn').addEventListener('click', function() {
        document.getElementById('updateStaffForm').submit();
    });

    // Show modal for changing password
    document.getElementById('btn-changePass').addEventListener('click', function() {
        var changePassModal = new bootstrap.Modal(document.getElementById('changePassModal'));
        changePassModal.show();
    });

    // Submit form for changing password
    document.getElementById('saveChangePassBtn').addEventListener('click', function() {
        var password = document.getElementById('new-password').value;
        var confirmPassword = document.getElementById('confirm-password').value;
        var passwordError = document.getElementById('password-error');
        var confirmPasswordError = document.getElementById('confirm-password-error');

        passwordError.textContent = '';
        confirmPasswordError.textContent = '';

        if (password.length < 8) {
            passwordError.textContent = 'Password must be at least 8 characters long.';
            return;
        }

        if (password !== confirmPassword) {
            confirmPasswordError.textContent = 'Passwords do not match.';
            return;
        }

        document.getElementById('changePassForm').submit();
    });
</script>
@endsection