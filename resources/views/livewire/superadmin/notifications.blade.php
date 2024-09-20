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

        <!-- Date Filter Form -->
        <form method="GET" action="{{ route('logs') }}">
            <div class="form-group">
                <label for="date">Filter by Date:</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
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
