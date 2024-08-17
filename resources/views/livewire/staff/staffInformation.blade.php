<!-- resources/views/staff/show.blade.php -->

@extends('layouts.staff')

@section('content')
<div class="container">
    <h2 class="form-title">Staff Information</h2>
    <form id="staffForm">
        <div class="form-section">
            <h6 class="form-section-title">Personal Information</h6>
            <div class="row">
                <div class="mb-3 form-group">
                <label for="staff-image">Profile Picture</label><br>
                <img id="staff-image" alt="Profile Picture" class="img-thumbnail" width="150">
            </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-lastname">Lastname</label>
                    <input type="text" id="staff-lastname" name="lastname" class="form-control" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-firstname">Firstname</label>
                    <input type="text" id="staff-firstname" name="firstname" class="form-control" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-middlename">Middlename</label>
                    <input type="text" id="staff-middlename" name="middlename" class="form-control" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-name_extension">Name Extension</label>
                    <input type="text" id="staff-name_extension" name="name_extension" class="form-control" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-sex">Sex</label>
                    <input type="text" id="staff-sex" name="sex" class="form-control" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-birthday">Birthday</label>
                    <input type="date" id="staff-birthday" name="birthday" class="form-control" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-age">Age</label>
                    <input type="number" id="staff-age" name="age" class="form-control" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-marital_status">Marital Status</label>
                    <input type="text" id="staff-marital_status" name="marital_status" class="form-control" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-contact_number">Contact Number</label>
                    <input type="text" id="staff-contact_number" name="contact_number" class="form-control" readonly>
                </div>
            </div>
            <div class="mb-3 form-group">
                <label for="staff-address">Address</label>
                <input type="text" id="staff-address" name="address" class="form-control" readonly>
            </div>
        </div>

        <div class="form-section">
            <h6 class="form-section-title">Employee Information</h6>
            <div class="row">
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-employee_id">Employee ID</label>
                    <input type="text" id="staff-employee_id" name="employee_id" class="form-control" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-email">Email</label>
                    <input type="email" id="staff-email" name="email" class="form-control" readonly>
                </div>
                <div class="col-md-4 mb-3 form-group">
                    <label for="staff-assigned_province">Assigned Province</label>
                    <input type="text" id="staff-assigned_province" name="assigned_province" class="form-control" readonly>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
