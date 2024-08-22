@extends('layouts.superadmin')

@section('title', 'Notifications')

@section('content')
<style>
.notification-title {
    font-size: 2rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 1.5rem;
}

.notification-container {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.notification-item {
    background-color: rgba(59, 130, 246, 0.1);
    padding: 1.5rem;
    border-left: 6px solid #3b82f6;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.notification-header {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.notification-message {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
}

.notification-timestamp {
    font-size: 1rem;
    color: #6c757d;
    text-align: right;
    display: block;
    margin-top: 1rem;
}

</style>
<div class="container">
    <h2 class="notification-title">Notification Center</h2>
    <div class="notification-container">
        <div class="notification-item">
            <h5 class="notification-header">Add Beneficiary</h5>
            <p class="notification-message">Staff added a new beneficiary</p>
            <span class="notification-timestamp">Received: August 22, 2024, 10:30 AM</span>
        </div>
        <div class="notification-item">
            <h5 class="notification-header">New Staff Registration</h5>
            <p class="notification-message">A new staff member, John Doe, has been successfully registered.</p>
            <span class="notification-timestamp">Received: August 22, 2024, 9:15 AM</span>
        </div>
    </div>
</div>
@endsection
