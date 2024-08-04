@extends('layouts.admin')

@section('title', 'Approve Staff')

@section('content')
    <h1>Approve Staff</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Staff Name</th>
                <th>Assigned Province</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $staffMember)
                <tr>
                    <td>{{ $staffMember->lastname }}, {{ $staffMember->firstname }} {{ $staffMember->middlename }}</td>
                    <td>{{ $staffMember->assigned_province }}</td>
                    <td>
                        <span class="badge {{ $staffMember->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($staffMember->status) }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('admin.approveStaff', $staffMember->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('PATCH')
                            @if ($staffMember->status == 'pending')
                                <button type="submit" class="btn btn-sm btn-primary">Approve</button>
                            @else
                                <button type="submit" class="btn btn-sm btn-warning">Deactivate</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection