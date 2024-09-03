
 <!-- Search Bar -->
 <div class="mb-4">
    <input type="text" id="beneficiary-search" class="form-control form-control-lg"
        placeholder="Search for a beneficiary...">
    <div id="search-results" class="list-group position-absolute" style="z-index: 1000; width: 96%;"></div>
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

     <!-- Floating Button -->
     <button type="submit" class="btn btn-primary rounded-circle shadow-lg position-fixed"
     style="bottom: 20px; right: 20px;">
     <i class="bi bi-plus-lg"></i>
 </button>

 <!-- Modal to Display Beneficiary Information -->
 <div class="modal fade" id="beneficiaryModal" tabindex="-1" aria-labelledby="beneficiaryModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="beneficiaryModalLabel">Social Pensioner Information</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <!-- Content will be populated by JavaScript -->
             </div>
         </div>
     </div>
 </div>

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