@extends('layouts.app')

@section('content')
          
        <body>
         <div id = "content">
            <div class="container">
                <h3 class="my-4">Membership Approval</h3>
        
                <form action="{{ route('admin.dashboard.show') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search by name or email" value="{{ request('query') }}">
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

                    <!-- Pagination -->
                    @if ($users->total() > 10)
                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
           
            </div>
    
        </body>
            <script>
                function approveUser(userId) {
                    // Make an AJAX request
                    $.ajax({
                        type: 'POST',
                        url: '/admin/approve-user/' + userId,
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
@endsection