@extends('layouts.staff')

@section('title', 'Search Beneficiaries')

@section('content')

    <body>

        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column" id="sidebar">
            <div class="toggle-sidebar" onclick="toggleSidebar()">
                <i class="bi bi-arrow-left-circle"></i>
            </div>
            <div class="profile-pic">
                <img src="path/to/profile-pic.jpg" alt="Profile Picture" class="img-fluid rounded-circle">
            </div>
            <div class="profile-name">Davao City Staff</div>
            <ul class="nav nav-pills flex-column mb-auto mt-4">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-house-door-fill"></i>
                        <span class="nav-link-text">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-people-fill"></i>
                        <span class="nav-link-text">List of Beneficiary</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="bi bi-person-fill"></i>
                        <span class="nav-link-text">Staff Information</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content" id="content">
            <div class="text-center">
                <img src="path/to/logo.png" alt="DSWD Logo" class="img-fluid logo">
                <h1 class="mt-3">Department of Social Welfare and Development</h1>
                <div class="search-bar">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const content = document.getElementById('content');
                sidebar.classList.toggle('collapsed');
            }
        </script>
    </body>
