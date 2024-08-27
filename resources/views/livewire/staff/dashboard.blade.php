@extends('layouts.staff')

@section('title', 'Search Beneficiaries')

@section('content')
    <!-- Main Content -->
    <div class="content" id="content">
        <div class="text-center">
            <img src="{{ asset('path/to/logo.png') }}" alt="DSWD Logo" class="img-fluid logo">
            <h1 class="mt-3">Department of Social Welfare and Development</h1>
            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Search...">
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            sidebar.classList.toggle('collapsed');
        }
    </script>
@endsection
