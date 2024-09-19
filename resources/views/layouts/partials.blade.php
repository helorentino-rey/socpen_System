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
                    <i class="bi bi-pencil-square" data-bs-toggle="modal"
                        data-bs-target="#statusModal{{ $beneficiary->id }}" style="cursor: pointer; color: black;"></i>

                    <a href="#" class="edit-beneficiary" data-id="{{ $beneficiary->id }}" style="cursor: pointer;"
                        title="Edit">
                        <i class="bi bi-pencil" style="color: black;"></i>
                    </a>

                    <a href="{{ route('pdf.show', ['id' => $beneficiary->id]) }}"
                        style="cursor: pointer; text-decoration: none;" title="Show Form">
                        <i class="bi bi-file-earmark-pdf" style="color: black;"></i>
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
        {{ $beneficiaries->links('pagination::bootstrap-4') }}
    </ul>
</nav>

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

<!-- Modal to Update Beneficiary Information -->
<div class="modal fade" id="editBeneficiaryModal" tabindex="-1" aria-labelledby="editBeneficiaryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBeneficiaryModalLabel">Edit Beneficiary Information</h5>
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content will be populated by JavaScript -->
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportModalLabel">Export Beneficiaries</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <!-- Add options for provinces here -->
                            <option value="DAVAO DEL NORTE">DAVAO DEL NORTE</option>
                            <option value="DAVAO DEL SUR">DAVAO DEL SUR</option>
                            <option value="DAVAO ORIENTAL">DAVAO ORIENTAL</option>
                            <option value="DAVAO DE ORO">DAVAO DE ORO</option>
                            <option value="DAVAO OCCIDENTAL">DAVAO OCCIDENTAL</option>
                            <!-- Add more provinces as needed -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Export</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                CSV file downloaded successfully.
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="errorMessage">
                <!-- Error message will be inserted here by JavaScript -->
            </div>
        </div>
    </div>
</div>


<!-- Include Bootstrap and jQuery JavaScript files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
    //Display Error and Success Modal
    $(document).ready(function() {
        $('#exportForm').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
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
                    var downloadFilename = (matches != null && matches[1] ? matches[1] :
                        filename + '.csv');

                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(response);
                    link.download = downloadFilename;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    // Show success modal
                    var successModal = new bootstrap.Modal(document.getElementById(
                        'successModal'));
                    successModal.show();
                },
                error: function(xhr) {
                    var errorMessage = xhr.responseJSON ? xhr.responseJSON.error :
                        'No records found for the selected province.';
                    $('#errorMessage').text(errorMessage);

                    // Show error modal
                    var errorModal = new bootstrap.Modal(document.getElementById(
                        'errorModal'));
                    errorModal.show();
                }
            });
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

    // Update Beneficiary Information
    function initializeModal() {
        // Function to handle the close button with confirmation
        document.querySelector('#editBeneficiaryModal .btn-close').addEventListener('click', function(event) {
            event.preventDefault();

            const confirmation = confirm(
                "Are you sure you want to close the form? Any unsaved changes will be lost.");

            if (confirmation) {
                const modal = bootstrap.Modal.getInstance(document.getElementById('editBeneficiaryModal'));
                modal.hide();
                // Redirect to the specified route after closing
                window.location.href = '/approved-beneficiary'; // Replace with your desired route
            }
        });

        // Set up event listener for the edit button
        $('.edit-beneficiary').click(function(e) {
            e.preventDefault();
            const beneficiaryId = $(this).data('id');

            // Call confirmEdit function for confirmation
            confirmEdit(beneficiaryId);
        });
    }

    // Function to confirm editing a beneficiary
    function confirmEdit(beneficiaryId) {
        if (confirm("Are you sure you want to edit this beneficiary?")) {
            // Fetch the beneficiary edit form via AJAX only if confirmed
            $.ajax({
                url: '/beneficiaries/edit/' + beneficiaryId,
                type: 'GET',
                success: function(response) {
                    // Populate the modal body with the response (edit form)
                    $('#editBeneficiaryModal .modal-body').html(response);
                    // Show the modal after successful AJAX call
                    const modal = new bootstrap.Modal(document.getElementById('editBeneficiaryModal'), {
                        backdrop: 'static',
                        keyboard: false
                    });
                    modal.show();
                    // Reinitialize modal events
                    initializeModal();
                },
                error: function() {
                    alert('Error loading beneficiary information.');
                }
            });
        }
    }

    // Initialize modal events on document ready
    $(document).ready(function() {
        initializeModal();
    });
</script>
