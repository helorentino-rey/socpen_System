@php
    use App\Models\Beneficiary;
@endphp

@extends('layouts.staff')

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

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1rem;
            }

            .navbar-nav .nav-link {
                font-size: 0.9rem;
                padding: 0.4rem 0;
            }
        }

        /* Search Bar */
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .beneficiary-status {
            margin-left: auto;
            padding-left: 10px;
            font-weight: bold;
        }

        /* Pagination */
        .pagination .page-link {
            font-size: 12px;
            /* Adjust the size as needed */
            padding: 0.25rem 0.5rem;
            /* Make the arrows smaller */
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            /* Your active link color */
            border-color: #007bff;
        }

        .pagination .page-link:hover {
            background-color: rgba(0, 86, 179, 0.1);
            /* Light blue background with transparency */
            border-color: #0056b3;
            /* Keep the border color */
        }
    </style>

    <!-- Top nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4" style="border: 1px solid black;">
        <div class="container-fluid">
            <div class="navbar-brand" style="color: black;">Beneficiary</div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('staff.beneficiaries.list') }}" class="nav-link" style="color: black;">
                            List of Beneficiaries
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.beneficiaries.create') }}" class="nav-link" style="color: black;">
                            Add Beneficiary
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="my-5 px-4">
        <div class="card shadow-sm p-4 rounded">

            <!-- Search Bar -->
            <div class="mb-4">
                <input type="text" id="beneficiary-search" class="form-control form-control-lg"
                    placeholder="Search for a beneficiary...">
                <div id="search-results" class="list-group position-absolute" style="z-index: 1000; width: 96%;"></div>
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
                ])->paginate(10); // Remove `get()` and add `paginate()`
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
                            <td>
                                <a href="#" class="beneficiary-name" data-id="{{ $beneficiary->id }}"
                                    style="color: inherit; text-decoration: none;">
                                    {{ $beneficiary->BeneficiaryInfo->last_name }}
                                    {{ $beneficiary->BeneficiaryInfo->first_name }},
                                    {{ $beneficiary->BeneficiaryInfo->middle_name }}
                                </a>
                            </td>
                            <td>{{ $beneficiary->mothersMaidenName->age }}</td>
                            <td>{{ $beneficiary->presentAddress->province }}</td>
                            <td id="status-{{ $beneficiary->id }}">{{ $beneficiary->status }}</td>
                            <td>
                                <a href="{{ route('layouts.edit', ['model' => 'beneficiary', 'id' => $beneficiary->id]) }}"
                                    style="cursor: pointer;" title="Edit" onclick="return confirmEdit();">
                                    <i class="bi bi-pencil" style="color: black;"></i>
                                </a>

                                <!-- The Modal for Status Update -->
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
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal to Display Beneficiary Information -->
            <div class="modal fade" id="beneficiaryModal" tabindex="-1" aria-labelledby="beneficiaryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="beneficiaryModalLabel">Social Pensioner
                                Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Content will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-4">
                <ul class="pagination">
                    {{ $beneficiaries->links('pagination::bootstrap-4') }}
                </ul>
            </nav>

                        <!-- Include Bootstrap and jQuery JavaScript files -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

                        <script>
                            //Display Beneficiary Information Modal
                            $(document).ready(function() {
                                $('.beneficiary-name').click(function(e) {
                                    e.preventDefault();
                                    const beneficiaryId = $(this).data('id');

                                    $.ajax({
                                        url: '/beneficiaries/' + beneficiaryId,
                                        type: 'GET',
                                        success: function(response) {
                                            $('#beneficiaryModal .modal-body').html(response);
                                            $('#beneficiaryModal').modal('show');
                                        },
                                        error: function() {
                                            $('#beneficiaryModal .modal-body').html(
                                                'Error loading beneficiary information.');
                                        }
                                    });
                                });
                            });

                            //Search for a Beneficiary
                            $(document).ready(function() {
                                $('#beneficiary-search').on('keyup', function() {
                                    const query = $(this).val();

                                    if (query.length > 2) {
                                        $.ajax({
                                            url: '{{ route('beneficiaries.search') }}',
                                            method: 'GET',
                                            data: {
                                                query: query
                                            },
                                            success: function(data) {
                                                let searchResults = $('#search-results');
                                                searchResults.empty();

                                                if (data.length > 0) {
                                                    data.forEach(function(beneficiary) {
                                                        searchResults.append(`
                              <a href="#" class="list-group-item list-group-item-action beneficiary-item" data-id="${beneficiary.id}">
    <span class="beneficiary-name">${beneficiary.name}</span>
    <span class="beneficiary-status">${beneficiary.status}</span>
</a>
                            `);
                                                    });
                                                } else {
                                                    searchResults.append(
                                                        '<div class="list-group-item">No results found</div>');
                                                }
                                            }
                                        });
                                    } else {
                                        $('#search-results').empty();
                                    }
                                });



                                // Handle click on a search result
                                $(document).on('click', '.beneficiary-item', function(e) {
                                    e.preventDefault();
                                    const beneficiaryId = $(this).data('id');

                                    $.ajax({
                                        url: '/beneficiaries/' + beneficiaryId,
                                        type: 'GET',
                                        success: function(response) {
                                            $('#beneficiaryModal .modal-body').html(response);
                                            $('#beneficiaryModal').modal('show');
                                        },
                                        error: function() {
                                            $('#beneficiaryModal .modal-body').html(
                                                'Error loading beneficiary information.');
                                        }
                                    });

                                    $('#search-results').empty();
                                    $('#beneficiary-search').val(''); // Clear the search input
                                });
                            });

                            //Edit beneficiary
                            function confirmEdit() {
                                return confirm('Do you want to edit beneficiary information?');
                            }

                            //Pagination
                            $(document).on('click', '.pagination a', function(e) {
                                e.preventDefault();
                                let page = $(this).attr('href').split('page=')[1];
                                fetchBeneficiaries(page);
                            });

                            function fetchBeneficiaries(page) {
                                $.ajax({
                                    url: '/beneficiaries?page=' + page,
                                    success: function(data) {
                                        $('.card').html(data);
                                    }
                                });
                            }
                        </script>
                    @endsection
