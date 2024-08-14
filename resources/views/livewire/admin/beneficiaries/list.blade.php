@extends('layouts.admin')

@section('title', 'List')
@section('content')
<style>
    .navbar {
    background-color: #f8f9fa; /* Light gray background */
    border-bottom: 2px solid #343a40; /* Darker border at the bottom */
    padding: 1rem 2rem; /* Padding for a better look */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

/* Navbar brand */
.navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
    color: #343a40; /* Dark gray text color */
    text-transform: uppercase;
}

/* Navbar links */
.navbar-nav .nav-link {
    font-size: 1rem;
    color: #495057; /* Medium gray text color */
    padding: 0.5rem 1rem;
    transition: color 0.3s ease-in-out;
    border-radius: 0.25rem;
}

/* Hover and active states for navbar links */
.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
    color: #ffffff; /* White text on hover */
    background-color: #343a40; /* Dark gray background on hover */
}

/* Navbar for mobile view */
@media (max-width: 991px) {
    .navbar {
        padding: 0.75rem 1.5rem;
    }
    .navbar-brand {
        font-size: 1.25rem;
    }
    .navbar-nav .nav-link {
        padding: 0.5rem 0;
    }
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .navbar-brand {
        font-size: 1rem;
    }
    .navbar-nav .nav-link {
        font-size: 0.9rem;
        padding: 0.4rem 0;
    }
}
</style>
 <!-- Top Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4" style="border: 1px solid black;">
        <div class="container-fluid">
            <div class="navbar-brand" style="color: black;">Beneficiary</div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.beneficiaries.approve') }}" class="nav-link" style="color: black;">Approve Beneficiaries</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.beneficiaries.create') }}" class="nav-link" style="color: black;">Add Beneficiary</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.beneficiaries.list') }}" class="nav-link" style="color: black;">List of Beneficiaries</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
     <!-- Page Content -->
     <div class="container">
        <h1>List of Beneficiaries</h1>
        
    </div>
@endsection
