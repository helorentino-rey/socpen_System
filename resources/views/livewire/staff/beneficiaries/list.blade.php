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

        .navbar-nav .nav-item .nav-link:hover,
        .navbar-nav .nav-item .nav-link.active {
            color: #1C4CB1 !important;
            background-color: transparent !important;
            text-decoration: none !important;
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
            font-size: 14px;

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

        .table {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
        }

        .form-control {
            font-size: 14px;
        }

        .icon-container {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background-color: #f54242;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
            text-align: center;
            margin-top: 10px;
        }

        .iconic-container {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background-color: #2db300;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
            text-align: center;
            margin-top: 10px;
        }

        .iconic-containers {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background-color: #f54242;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
            text-align: center;
            margin-top: 10px;
        }

        .icon-style {
            color: white;
            font-size: 2.5rem;
        }

        .acm {
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 1rem;
            margin: auto;
        }

        .dlg {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 60px);
        }

        .custom-bton {
            background-color: transparent;
            border: 2px solid #4d4dff;
            color: #4d4dff;
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
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="color: black;" data-bs-toggle="modal"
                            data-bs-target="#exportModal">
                            <i class="bi bi-file-earmark-arrow-up"></i> Export Beneficiary
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="my-5 px-4" style="font-family: 'Arial', sans-serif;">
        <div class="card shadow-sm p-4 rounded">

            <!-- Search Bar -->
            <div class="mb-4 position-relative">
                <div class="input-group">
                    <span class="input-group-text" id="search-icon">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="beneficiary-search" class="form-control form-control-lg"
                        placeholder="Search for a beneficiary...">
                </div>
                <div id="search-results" class="list-group position-absolute" style="z-index: 1000; width: 100%;"></div>
            </div>

            @php
                $beneficiaries = Beneficiary::with([
                    'addresses',
                    'affiliation',
                    'assessmentRecommendation',
                    'beneficiaryInfo',
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

                                <a href="#" class="edit-beneficiary" data-id="{{ $beneficiary->id }}"
                                    style="cursor: pointer;" title="Edit">
                                    <i class="bi bi-pencil" style="color: black;"></i>
                                </a>

                                <a href="{{ route('export.pdf', ['id' => $beneficiary->id]) }}"
                                    style="cursor: pointer; text-decoration: none;" title="Show Form" target="_blank">
                                    <i class="bi bi-file-earmark-pdf" style="color: black;"></i>
                                </a>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Content will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal to Update Beneficiary Information -->
            <div class="modal fade" id="editBeneficiaryModal" tabindex="-1" aria-labelledby="editBeneficiaryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" aria-label="Close"></button>
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
                    @if ($beneficiaries->hasPages())
                        {{ $beneficiaries->links('pagination::bootstrap-4') }}
                    @else
                        <!-- Render empty pagination links to maintain layout -->
                        <li class="page-item"><a class="page-link">‹</a></li>
                        <li class="page-item"><a class="page-link">1</a></li>
                        <li class="page-item"><a class="page-link">2</a></li>
                        <li class="page-item"><a class="page-link">3</a></li>
                        <li class="page-item"><a class="page-link">4</a></li>
                        <li class="page-item"><a class="page-link">5</a></li>
                        <li class="page-item"><a class="page-link">›</a></li>
                    @endif
                </ul>
            </nav>

            <!-- Export Modal -->
            <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exportModalLabel">Export Beneficiaries</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="exportForm" action="{{ route('beneficiaries.export') }}" method="GET">
                                <div class="alert alert-info" role="alert">
                                    If you want to export everything, just add a filename and click export.
                                </div>
                                <div class="mb-2">
                                    <label for="filename">Filename</label>
                                    <input type="text" id="filename" name="filename" placeholder="Enter filename"
                                        class="form-control" required>
                                </div>
                                <div class="mb-2">
                                    <label for="province">Province</label>
                                    <select id="province" name="province" class="form-control">
                                        <option value="">All Provinces</option>
                                        <option value="DAVAO DEL NORTE">DAVAO DEL NORTE</option>
                                        <option value="DAVAO DEL SUR">DAVAO DEL SUR</option>
                                        <option value="DAVAO ORIENTAL">DAVAO ORIENTAL</option>
                                        <option value="DAVAO DE ORO">DAVAO DE ORO</option>
                                        <option value="DAVAO OCCIDENTAL">DAVAO OCCIDENTAL</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Export</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Modal -->
            <div class="modal fade" id="successModal1" tabindex="-1" aria-labelledby="successModalLabel"
                aria-hidden="true">
                <div class="modal-dialog dlg">
                    <div class="modal-content acm">
                        <div class="iconic-container">
                            <i class="bi bi-check-lg icon-style"></i>
                        </div>
                        <div class="modal-body">
                            CSV file downloaded successfully!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                id="successCloseButtonFooter">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Error Modal -->
            <div class="modal fade" id="errorModal1" tabindex="-1" aria-labelledby="errorModalLabel"
                aria-hidden="true">
                <div class="modal-dialog dlg">
                    <div class="modal-content acm">
                        <div class="modal-header">
                            <div class="iconic-containers">
                                <i class="bi bi-x-lg icon-style"></i>
                            </div>
                        </div>
                        <div class="modal-body" id="errorMessage">
                            <!-- Error message will be inserted here by JavaScript -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Include Bootstrap and jQuery JavaScript files -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

            <script>
                //Display Error and Success Modal
                $(document).ready(function() {
                    $('#exportForm').on('submit', function(e) {
                        e.preventDefault();
                        exportData();
                    });

                    function exportData() {
                        var form = $('#exportForm');
                        var url = form.attr('action');
                        var formData = form.serialize();
                        var filename = $('#filename').val();

                        $.ajax({
                            url: url,
                            type: 'GET',
                            data: formData,
                            xhrFields: {
                                responseType: 'blob'
                            },
                            success: function(response, status, xhr) {
                                var disposition = xhr.getResponseHeader('content-disposition');
                                var matches = /"([^"]*)"/.exec(disposition);
                                var downloadFilename = (matches != null && matches[1] ? matches[1] : filename +
                                    '.csv');

                                var link = document.createElement('a');
                                link.href = window.URL.createObjectURL(response);
                                link.download = downloadFilename;
                                document.body.appendChild(link);
                                link.click();
                                document.body.removeChild(link);

                                // Close export modal
                                var exportModal = bootstrap.Modal.getInstance(document.getElementById(
                                    'exportModal'));
                                exportModal.hide();

                                // Show success modal
                                var successModal = new bootstrap.Modal(document.getElementById(
                                    'successModal1'));
                                successModal.show();

                                // Add event listeners to close buttons
                                $('#successCloseButton, #successCloseButtonFooter').on('click', function() {
                                    window.location.href =
                                        '/beneficiary/list'; // Replace with your actual view URL
                                });
                            },
                            error: function(xhr) {
                                var errorMessage = xhr.responseJSON ? xhr.responseJSON.error :
                                    'No records found for the selected province.';
                                $('#errorMessage').text(errorMessage);

                                // Show error modal
                                var errorModal = new bootstrap.Modal(document.getElementById('errorModal1'));
                                errorModal.show();
                            }
                        });
                    }
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
            <script>
                // Update Beneficiary Information
                function initializeBeneficiaryCheckboxes() {
                    const affiliationTypes = "{{ $beneficiary->affiliation->affiliation_type ?? '' }}".split(', ');

                    const listahananCheckbox = document.getElementById('listahanan');
                    const pantawidCheckbox = document.getElementById('pantawid');
                    const hhIdField = document.getElementById('hh_id');
                    const indigenousCheckbox = document.getElementById('indigenous');
                    const indigenousSpecifyField = document.getElementById('indigenous_specify');

                    // // Set initial state of checkboxes
                    // listahananCheckbox.checked = affiliationTypes.includes('Listahanan');
                    // pantawidCheckbox.checked = affiliationTypes.includes('Pantawid Beneficiary');
                    // indigenousCheckbox.checked = affiliationTypes.includes('Indigenous People');

                    // Set initial visibility of additional fields
                    hhIdField.style.display = pantawidCheckbox.checked ? 'block' : 'none';
                    indigenousSpecifyField.style.display = indigenousCheckbox.checked ? 'block' : 'none';

                    // Add event listeners to handle visibility on change
                    pantawidCheckbox.addEventListener('change', function() {
                        hhIdField.style.display = this.checked ? 'block' : 'none';
                        if (!this.checked) hhIdField.value = ''; // Clear the field when unchecked
                    });

                    indigenousCheckbox.addEventListener('change', function() {
                        indigenousSpecifyField.style.display = this.checked ? 'block' : 'none';
                        if (!this.checked) indigenousSpecifyField.value = ''; // Clear the field when unchecked
                    });

                    // Add event listener to clear other fields when "Listahanan" is checked
                    // listahananCheckbox.addEventListener('change', function() {
                    //     if (this.checked) {
                    //         pantawidCheckbox.checked = false;
                    //         hhIdField.value = '';
                    //         hhIdField.style.display = 'none';

                    //         indigenousCheckbox.checked = false;
                    //         indigenousSpecifyField.value = '';
                    //         indigenousSpecifyField.style.display = 'none';
                    //     }
                    // });
                }

                // Initialize modal and reapply checkbox logic
                function initializeModal() {
                    document.querySelector('#editBeneficiaryModal .btn-close').addEventListener('click', function(event) {
                        event.preventDefault();

                        const confirmation = confirm(
                            "Are you sure you want to close the form? Any unsaved changes will be lost.");
                        if (confirmation) {
                            const modal = bootstrap.Modal.getInstance(document.getElementById('editBeneficiaryModal'));
                            modal.hide();
                            window.location.href = '/beneficiary/list'; // Optional redirection
                        }
                    });

                    // Set up event listener for the edit button
                    $('.edit-beneficiary').click(function(e) {
                        e.preventDefault();
                        const beneficiaryId = $(this).data('id');

                        confirmEdit(beneficiaryId);
                    });
                }

                // Fetch form via AJAX and reapply checkbox logic
                function confirmEdit(beneficiaryId) {
                    if (confirm("Are you sure you want to edit this beneficiary?")) {
                        $.ajax({
                            url: '/beneficiaries/edit/' + beneficiaryId,
                            type: 'GET',
                            success: function(response) {
                                $('#editBeneficiaryModal .modal-body').html(response);
                                const modal = new bootstrap.Modal(document.getElementById('editBeneficiaryModal'), {
                                    backdrop: 'static',
                                    keyboard: false
                                });
                                modal.show();

                                // Reinitialize modal and checkboxes after content is loaded
                                initializeModal();
                                initializeBeneficiaryCheckboxes(); // Reapply checkbox logic here
                            },
                            error: function() {
                                alert('Error loading beneficiary information.');
                            }
                        });
                    }
                }

                // Initialize modal and checkbox logic on document ready
                $(document).ready(function() {
                    initializeModal();
                    initializeBeneficiaryCheckboxes();
                });
            </script>
        @endsection
