@extends('layouts.superadmin')

@section('title', 'Add Beneficiary')

@section('content')
  
<style>
  .table {
    font-size: 1.1rem; /* Slightly larger text for better readability */
}

.table th, .table td {
    text-align: center; /* Center align the text */
    vertical-align: middle; /* Vertically center the content */
}

.btn-export {
    font-size: 1rem; /* Adjust button size */
    padding: 0.5rem 1rem;
    background-color: #3b82f6;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-export:hover {
    background-color: #2563eb;
}
.navbar {
            background-color: #f8f9fa;
            border-bottom: 2px solid #343a40;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #343a40;
            text-transform: uppercase;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            color: #495057;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease-in-out;
            border-radius: 0.25rem;
        }


        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #007bff;
            background-color: transparent;
            text-decoration: underline;
            text-decoration-color: #007bff;
            text-decoration-thickness: 3px;
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
<nav class="navbar navbar-expand-lg navbar-light bg-white mb-4" style="border: 1px solid black;">
        <div class="container-fluid">
            <div class="navbar-brand" style="color: black;">Beneficiary</div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('superadmin.beneficiaries.list') }}" class="nav-link" style="color: black;">List of Beneficiaries</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('superadmin.beneficiaries.create') }}" class="nav-link" style="color: black;">Add Beneficiary</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
    <h2 class="form-title">List of Beneficiaries</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Export</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Active</td>
                    <td><button class="btn btn-primary btn-export">Export</button></td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>Inactive</td>
                    <td><button class="btn btn-primary btn-export">Export</button></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>


@endsection