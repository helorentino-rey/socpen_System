@php
    use App\Models\Beneficiary;
@endphp

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

            @php
                $beneficiaries = Beneficiary::with([
                    'addresses',
                    'affiliation',
                    'assessmentRecommendation',
                    'beneficiaryInfo',
                    'caregiver',
                    'child',
                    'economicInformation',
                    'healthInformation',
                    'housingLivingStatus',
                    'mothersMaidenName',
                    'representative',
                    'spouse',
                ])->get();
            @endphp

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
                            <td>{{ $beneficiary->BeneficiaryInfo->last_name }}
                                {{ $beneficiary->BeneficiaryInfo->first_name }},
                                {{ $beneficiary->BeneficiaryInfo->middle_name }}</td>
                            <td>{{ $beneficiary->mothersMaidenName->age }}</td>
                            <td>{{ $beneficiary->presentAddress->province }}</td>
                            <td id="status-{{ $beneficiary->id }}">{{ $beneficiary->status }}</td>
                            <td>
                                <button class="btn btn-light border rounded-circle" data-bs-toggle="modal"
                                    data-bs-target="#statusModal{{ $beneficiary->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <!-- The Modal -->
                                <div class="modal fade" id="statusModal{{ $beneficiary->id }}" tabindex="-1"
                                    aria-labelledby="statusModalLabel{{ $beneficiary->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="statusModalLabel{{ $beneficiary->id }}">Change
                                                    Status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="statusForm{{ $beneficiary->id }}"
                                                    action="{{ route('beneficiary.updateStatus', $beneficiary->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" id="status" name="status" required>
                                                            <option value="ACTIVE"
                                                                {{ $beneficiary->status == 'ACTIVE' ? 'selected' : '' }}>
                                                                ACTIVE</option>
                                                            <option value="WAITLISTED"
                                                                {{ $beneficiary->status == 'WAITLISTED' ? 'selected' : '' }}>
                                                                WAITLISTED</option>
                                                            <option value="SUSPENDED"
                                                                {{ $beneficiary->status == 'SUSPENDED' ? 'selected' : '' }}>
                                                                SUSPENDED</option>
                                                            <option value="UNVALIDATED"
                                                                {{ $beneficiary->status == 'UNVALIDATED' ? 'selected' : '' }}>
                                                                UNVALIDATED</option>
                                                            <option value="NOT LOCATED"
                                                                {{ $beneficiary->status == 'NOT LOCATED' ? 'selected' : '' }}>
                                                                NOT LOCATED</option>
                                                            <option value="DOUBLE ENTRY"
                                                                {{ $beneficiary->status == 'DOUBLE ENTRY' ? 'selected' : '' }}>
                                                                DOUBLE ENTRY</option>
                                                            <option value="TRANSFER OF RESIDENCE"
                                                                {{ $beneficiary->status == 'TRANSFER OF RESIDENCE' ? 'selected' : '' }}>
                                                                TRANSFER OF RESIDENCE</option>
                                                            <option value="RECEIVING SUPPORT FROM THE FAMILY"
                                                                {{ $beneficiary->status == 'RECEIVING SUPPORT FROM THE FAMILY' ? 'selected' : '' }}>
                                                                RECEIVING SUPPORT FROM THE FAMILY</option>
                                                            <option value="RECEIVING PENSION FROM OTHER AGENCY"
                                                                {{ $beneficiary->status == 'RECEIVING PENSION FROM OTHER AGENCY' ? 'selected' : '' }}>
                                                                RECEIVING PENSION FROM OTHER AGENCY</option>
                                                            <option value="WITH PERMANENT INCOME"
                                                                {{ $beneficiary->status == 'WITH PERMANENT INCOME' ? 'selected' : '' }}>
                                                                WITH PERMANENT INCOME</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <button type="submit" class="btn btn-primary rounded-circle shadow-lg position-fixed"
        style="bottom: 20px; right: 20px;">
        <i class="bi bi-file-earmark-arrow-up"></i>
    </button>
    <button type="submit" class="btn btn-primary rounded-circle shadow-lg position-fixed"
        style="bottom: 80px; right: 20px;">
        <i class="bi bi-file-earmark-arrow-down"></i>
    </button>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($beneficiaries as $beneficiary)
                document.getElementById('statusForm{{ $beneficiary->id }}').addEventListener('submit', function(
                e) {
                    e.preventDefault();
                    var form = this;
                    var formData = new FormData(form);
                    fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('status-{{ $beneficiary->id }}').innerText =
                                    formData.get('status');
                                var modal = bootstrap.Modal.getInstance(document.getElementById(
                                    'statusModal{{ $beneficiary->id }}'));
                                modal.hide();
                            } else {
                                alert('Failed to update status');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            @endforeach
        });
    </script>
@endsection
