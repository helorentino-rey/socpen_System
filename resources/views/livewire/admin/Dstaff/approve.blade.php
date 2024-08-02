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
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $staffMember)
                <tr>
                    <td>{{ $staffMember->lastname }}, {{ $staffMember->firstname }} {{ $staffMember->middlename }}</td>
                    <td>{{ $staffMember->assigned_province }}</td>
                    <td>
                        <form action="{{ route('admin.approveStaff', $staffMember->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm {{ $staffMember->status == 'active' ? 'btn-success' : 'btn-danger' }}">
                                {{ ucfirst($staffMember->status) }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
