@extends('layouts.superadmin')

@section('content')
    <style>
        /* Ensure body does not scroll */
        body {
            overflow: hidden;
            margin: 0;
        }

        /* Main content container (acting as sidebar) */
        .design {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            /* Align items to the top */
            min-height: 110vh; /* Increased height for the sidebar */
            max-width: 100vw;
            /* Prevent horizontal overflow */
            max-height: 100vh;
            /* Prevent vertical overflow */
            overflow: hidden;
            /* Prevent overflow */
            padding-top: 30px; /* Reduced top padding */
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

        .search-bar {
            height: 80vh; /* Adjusted to occupy 80% of viewport height */
            width: 100%;
            max-width: 800px;
            position: relative;
            margin-top: 20px; /* Adjust the search bar position */
            display: flex;
            flex-direction: column;
        }

        #search-results {
            position: absolute;
            z-index: 1000;
            width: 100%;
            max-height: 100%; /* Allow search results to use available space */
            overflow-y: auto;
            /* Enable scrolling inside search results if needed */
        }

        /* Navigation Buttons */
        .nav-buttons {
            width: 100%;
            max-width: 800px;
            display: flex;
            justify-content: center; /* Center the buttons */
            margin-bottom: 20px;
            gap: 10px; /* Adjust the gap between buttons */
        }

        .nav-buttons .btn {
            font-size: 1rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-buttons .btn i {
            font-size: 1.2rem;
        }

        /* Button Styles */
        .btn-list, .btn-add {
            background-color: white;
            color: #1C4CB1; /* Blue text */
            border: 2px solid #1C4CB1; /* Blue border */
            border-radius: 50px;
            padding: 10px 20px;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
        }

        /* Hover effect */
        .btn-list:hover, .btn-add:hover {
            background-color: #1C4CB1; /* Change background to blue */
            color: white; /* Change text color to white */
        }

        .modal-lg {
            max-width: 60%;
        }

        .soc {
            margin-bottom: -30px;
            margin-top: -20px; /* Move logos higher */
        }

        h1 {
            margin-top: 10px; /* Move title higher */
        }
    </style>

    <!-- Main Content -->
    <div class="design" id="content">
        <!-- DSWD Logo and Title -->
        <div class="soc mt-5">
            <img src="{{ asset('img/social-pension-logo.png') }}" alt="DSWD Logo" class="img-fluid"
                style="max-height: 150px;">
            <img src="{{ asset('img/DSWDColored.png') }}" alt="DSWD Logo" class="img-fluid" style="max-height: 80px;">
        </div>
        <h1 class="mt-3" style="font-weight: bold; color: #1C4CB1; font-size: 3.5rem;">
            SOCIAL PENSION UNIT
        </h1>

        <!-- Navigation Buttons -->
        <div class="nav-buttons mt-4">
            <a href="{{ route('superadmin.beneficiaries.list') }}" class="btn btn-list">
                <i class="bi bi-list"></i> List of Beneficiaries
            </a>
            <a href="{{ route('superadmin.beneficiaries.create') }}" class="btn btn-add">
                <i class="bi bi-plus"></i> Add Beneficiary
            </a>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"
                    style="background-color: white; border-radius: 50px 0 0 50px; border-right: none;">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" id="beneficiary-search" class="form-control" placeholder="Search..."
                    style="border-radius: 0 50px 50px 0; border-left: none;">
            </div>
            <div id="search-results" class="list-group"></div>
        </div>
    </div>

    <!-- Modal to Display Beneficiary Information -->
    <div class="modal fade" id="beneficiaryModal" tabindex="-1" aria-labelledby="beneficiaryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="beneficiaryModalLabel">Social Pensioner Information</h5>
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
        //Dashboard
        $(document).ready(function() {
            // Show Dashboard button click event
            $('#show-dashboard').click(function() {
                // Hide the original view elements
                $('#beneficiary-search').hide();
                $('.beneficiary-list').hide();
                $(this).hide();

                // Show the dashboard elements
                $('#return-home').show();
                $('.dashboard-content').show();
            });

            // Return to Home button click event
            $('#return-home').click(function() {
                // Show the original view elements
                $('#beneficiary-search').show();
                $('.beneficiary-list').show();
                $('#show-dashboard').show();

                // Hide the dashboard elements
                $(this).hide();
                $('.dashboard-content').hide();
            });
        });

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