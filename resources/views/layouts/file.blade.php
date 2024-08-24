@extends('layouts.superadmin')

@section('content')
    <style>
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

    <!-- Top nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4" style="border: 1px solid black;">
        <div class="container-fluid">
            <div class="navbar-brand" style="color: black;">Beneficiary</div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('superadmin.beneficiaries.list') }}" class="nav-link" style="color: black;">List
                            of Beneficiaries</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('superadmin.beneficiaries.create') }}" class="nav-link" style="color: black;">Add
                            Beneficiary</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="my-5 px-4">
        <div class="card shadow-sm p-4 rounded">
            
            <!-- Search Bar -->
            <div class="mb-4">
                <input type="text" class="form-control form-control-lg" placeholder="Search">
            </div>

            <!-- Beneficiary List Table -->
            <table class="table table-borderless w-100">
                <thead class="border-bottom">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Province</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiaries as $beneficiary)
                        <tr>
                            <td>{{ $beneficiary->BeneficiaryInfo->last_name }} {{ $beneficiary->BeneficiaryInfo->first_name }},
                                {{ $beneficiary->BeneficiaryInfo->middle_name }}</td>
                            <td>{{ $beneficiary->date_of_birth->age }}</td>
                            <td>{{ $beneficiary->addresses->province }}</td>
                            <td>{{ $beneficiary->beneficiary->status }}</td>
                            <td>
                                <button class="btn btn-light border rounded-circle">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-4">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Floating Button -->
    {{-- <form action="{{ route('superadmin.beneficiaries.import') }}" method="get"> --}}
        <button type="submit" class="btn btn-primary rounded-circle shadow-lg position-fixed"
            style="bottom: 20px; right: 20px;">
            <i class="bi bi-file-earmark-arrow-up"></i>
        </button>
    </form>
{{-- 
    <form action="{{ route('superadmin.beneficiaries.export') }}" method="get"> --}}
        <button type="submit" class="btn btn-primary rounded-circle shadow-lg position-fixed"
            style="bottom: 80px; right: 20px;">
            <i class="bi bi-file-earmark-arrow-down"></i>
        </button>
    </form>
@endsection