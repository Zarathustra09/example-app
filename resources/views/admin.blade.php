@extends('layouts.app')
@section('content')
    <body>
        <div id="content">
            <div class="container">
                <h3 class="my-4">Membership Approval</h3>
                 <!-- Link to Corporate Membership Approval Table -->
                 <div class="mb-3">
                    <a href="{{ route('admin.corporateDashboard') }}" class="btn btn-primary">Corporate Membership Approval</a>
                </div>
                
                <form action="{{ route('admin.dashboard.show') }}" method="GET" class="mb-3">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="approvalTableBody">
                            @include('partials.approval-table')
                        </tbody>
                    </table>

                    <!-- Minimalistic Pagination -->
                    @if ($users->total() > 10)
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                {{ $users->links() }}
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </body>
@endsection

    <script>
        function approveUser(userId) {
    // Extract the current page from the pagination links
    var currentPage = $('.pagination .active span').text();

    // Make an AJAX request
    $.ajax({
        type: 'POST',
        url: '/admin/approve-user/' + userId + '?page=' + currentPage,
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


                            function deleteUser(userId) {
                    // Make an AJAX request to delete the user
                    $.ajax({
                        type: 'DELETE',
                        url: '/admin/delete-user/' + userId,
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
