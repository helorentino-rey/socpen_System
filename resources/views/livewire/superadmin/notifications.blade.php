@extends('layouts.superadmin')

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
            margin-top: 30px;
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

        .heading-border {
            margin-right: 10px;
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

        .dswd-logo {
            height: 50px;
            margin-left: 10px;
        }

        .social-pension-logo {
            height: 100px;
            margin-left: 10px;
            margin-bottom: 9px;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            height: 30px;
            font-size: 13px;
            font-family: 'Arial', sans-serif;
            width: 50%;
            max-width: 150px;
            margin-left: 5px;
        }

        .form-group {
            margin-top: 10px;
        }
    </style>

    <div class="container">
        <div class="header-container">
            <h1 class="heading-border">Notification Center</h1>
            <div class="logos-container">
                <img src="{{ asset('img/DSWDColored.png') }}" alt="DSWD Logo" class="dswd-logo">
                <img src="{{ asset('img/social-pension-logo.png') }}" alt="Social Pension Logo" class="social-pension-logo">
            </div>
        </div>

        <!-- Date Filter Form -->
        <form method="GET" action="{{ route('logs') }}">
            <div class="form-group d-flex align-items-center">
                <label for="date" class="mb-0">Filter by Date:</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mt-2">Filter</button>
        </form>

        <div class="notification-container">
            @foreach ($logs as $log)
                <div class="notification-item">
                    <h5 class="notification-header">Log Entry</h5>
                    <p class="notification-message">{{ $log->action }}</p>
                    <p class="notification-user">User: {{ $log->user }}</p>
                    <span class="notification-timestamp">Received:
                        {{ $log->created_at->setTimezone('Asia/Manila')->format('F j, Y, g:i A') }}</span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
