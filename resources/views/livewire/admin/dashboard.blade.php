@extends('layouts.admin')

@section('content')
    <style>
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
    </style>

    <!-- Main Content -->
    <div class="content text-center" id="content"
        style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh;">
        <!-- DSWD Logo and Title -->
        <div class="mt-5">
            <img src="{{ asset('path/to/logo.png') }}" alt="DSWD Logo" class="img-fluid" style="max-height: 150px;">
            <img src="{{ asset('path/to/logo.png') }}" alt="DSWD Logo" class="img-fluid" style="max-height: 150px;">
        </div>
        <h1 class="mt-3" style="font-weight: bold; color: #1C4CB1; font-size: 2.5rem;">
            SOCIAL PENSION UNIT
        </h1>

        <!-- Search Bar -->
        <div class="search-bar mt-4" style="width: 60%; max-width: 800px;">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"
                    style="background-color: white; border-radius: 50px 0 0 50px; border-right: none;">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" id="beneficiary-search" class="form-control" placeholder="Search..."
                    style="border-radius: 0 50px 50px 0; border-left: none;">
            </div>
            <div id="search-results" class="list-group position-absolute" style="z-index: 1000; width: 37%;"></div>
        </div>

        <!-- Navigation Links -->
        <div class="mt-4 d-flex justify-content-center" style="gap: 50px;">
            <a href="{{ route('admin.beneficiaries.list') }}" class="text-decoration-none nav-link"
                style="font-size: 1.25rem; font-weight: 500; color: black;">
                <span class="hover-effect">List of Beneficiaries</span>
            </a>
            <a href="{{ route('admin.beneficiaries.create') }}" class="text-decoration-none nav-link"
                style="font-size: 1.25rem; font-weight: 500; color: black;">
                <span class="hover-effect">Add Beneficiary</span>
            </a>
        </div>
    </div>

    <!-- Modal to Display Beneficiary Information -->
    <div class="modal fade" id="beneficiaryModal" tabindex="-1" aria-labelledby="beneficiaryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="beneficiaryModalLabel">Social Pensioner
                        Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </div>


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

        // Search for a Beneficiary
        $(document).ready(function() {
            $('#beneficiary-search').on('keyup', function() {
                const query = $(this).val();

                if (query.length > 2) {
                    $.ajax({
                        url: '{{ route('benefi.search') }}',
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
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ' + status + error);
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
    </script>
@endsection
