@extends('layouts.admin')

@section('title', 'Search Beneficiaries')

@section('content')
<style scoped>
.main-container {
  margin-left: 250px; /* Adjust this value based on the actual sidebar width */
  padding: 2rem;
  background-color: #ffffff;
}

.header-right {
  margin-left: auto;
}

.header-right img {
  height: 48px;
}

.form {
  background-color: #f9f9f9;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.section {
  margin-bottom: 2rem;
}

.section-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1rem;
}

.section-header h2 {
  font-size: 1.25rem;
  font-weight: bold;
}

.profile-pic-container {
  display: flex;
  justify-content: center;
  margin-bottom: 1rem;
}

.profile-pic {
  width: 96px;
  height: 96px;
  background-color: #cccccc;
  border-radius: 50%;
}

.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1rem;
}

.grid-container.single-column {
  grid-template-columns: 1fr;
}

.grid-container input {
  padding: 0.5rem;
  border: 1px solid #cccccc;
  border-radius: 4px;
}

.grid-container input:focus {
  outline: none;
  border-color: #3b82f6;
  box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
}

.submit-button {
  padding: 0.75rem 1.5rem;
  background-color: #3b82f6;
  color: #ffffff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-button:hover {
  background-color: #2563eb;
}

.submit-button:focus {
  outline: none;
  box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
}
</style>
<div class="main-container">
    
        @csrf
        <div class="section">
            <div class="section-header">
                <h2>Personal Information</h2>
                <div class="header-right">
                    <img src="{{ asset('Auth/Img/SOCPEN_Img.png') }}" alt="Logo">
                </div>
            </div>
            <div class="profile-pic-container">
                <div class="profile-pic"></div>
            </div>
            <div class="grid-container">
                <input name="lastName" type="text" placeholder="Last Name" value="{{ old('lastName') }}">
                <input name="firstName" type="text" placeholder="First Name" value="{{ old('firstName') }}">
                <input name="middleName" type="text" placeholder="Middle Name" value="{{ old('middleName') }}">
                <input name="nameExtension" type="text" placeholder="Name Extension" value="{{ old('nameExtension') }}">
                <input name="sex" type="text" placeholder="Sex" value="{{ old('sex') }}">
                <input name="birthday" type="date" placeholder="Birthday" value="{{ old('birthday') }}">
                <input name="age" type="number" placeholder="Age" value="{{ old('age') }}">
                <input name="maritalStatus" type="text" placeholder="Marital Status" value="{{ old('maritalStatus') }}">
                <input name="contactNumber" type="tel" placeholder="Contact Number" class="col-span-2" value="{{ old('contactNumber') }}">
                <input name="address" type="text" placeholder="Address" class="col-span-2" value="{{ old('address') }}">
            </div>
        </div>
        <div class="section">
            <h2>Employee Information</h2>
            <div class="grid-container single-column">
                <input name="employeeId" type="text" placeholder="Employee ID" value="{{ old('employeeId') }}">
                <input name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                <input name="newPassword" type="password" placeholder="New Password">
                <input name="confirmPassword" type="password" placeholder="Confirm Password">
                <input name="assignedProvince" type="text" placeholder="Assigned Province" value="{{ old('assignedProvince') }}">
            </div>
        </div>
        <button type="submit" class="submit-button">Save Changes</button>
    
</div>
@endsection
