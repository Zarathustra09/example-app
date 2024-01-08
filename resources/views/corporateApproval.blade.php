@extends('layouts.app')

@section('content')
          
            <body>
                <div id="content">
                    <div class="container">
                        <h3 class="my-4">Corporate Approval</h3>
                        <div class="mb-3">
                            <a href="{{ route('admin.dashboard.show') }}" class="btn btn-primary">Individual Membership Approval</a>
                        </div>

                        <form action="{{ route('admin.corporateDashboard') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control" placeholder="Search by name or email"
                                    value="{{ request('query') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="approvalTableBody">
                                    @include('partials.corporate_approval-table')
                                </tbody>
                            </table>

                            <!-- Minimalistic Pagination -->
                            @if ($corporateUsers->total() > 10)
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        {{ $corporateUsers->links() }}
                                    </ul>
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </body>
 @endsection

 <script>
    function approveCorporateUser(userId) {
        // Extract the current page from the pagination links
        var currentPage = $('.pagination .active span').text();

        // Make an AJAX request
        $.ajax({
            type: 'POST',
            url: '/approve-corporate-user/' + userId + '?page=' + currentPage,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                // Check if the container element exists
                var tableContainer = $('#approvalTableBody');

                if (tableContainer.length) {
                    // Update the content of the table with the new data
                    tableContainer.html(response.table_body);
                } else {
                    console.error('Table container not found');
                }

                // Update the pagination links
                var paginationContainer = $('#paginationContainer');
                if (paginationContainer.length) {
                    paginationContainer.html(response.pagination);
                } else {
                    console.error('Pagination container not found');
                }

                // Close the modal if you're using one
                $('#userModal' + userId).modal('hide');
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function deleteCorporateUser(userId) {
        // Make an AJAX request to delete the user
        $.ajax({
            type: 'DELETE',
            url: '/admin/delete-corporate-user/' + userId,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                // Update the content of the table with the new data
                $('#approvalTableBody').html(response.table_body);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
</script>
