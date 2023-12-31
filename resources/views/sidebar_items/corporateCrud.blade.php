@extends('layouts.app')

@section('content')
<body>
    
    <div id="content">
        <div class="container">
            <div class="table-responsive">
                <h3>Members CRUD Table</h3>
                <div class="mb-3">
                    <a href="{{ route('members.index') }}" class="btn btn-primary">Individual Crud</a>
                </div>
                
                    <form action="{{ route('members.index') }}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search members by name or email" value="{{ request('query') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                
                
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            
                            <th>Name</th>
                            <th>Email</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="membersCrudTableBody">
                        @include('partials.corporate_crud-table', ['members' => $members])
                    </tbody>
                </table>
                
                </body>
                <!-- Pagination Links -->
                @if ($members->total() > 10)
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{ $members->links() }}
                    </ul>
                </nav>
                @endif
                
                
                </div>
        </div>
    </div>
</body>


@endsection

<script>
   function updateCorporateMember(memberId) {
    var formData = {
        company_name: $('#editName' + memberId).val(),
        email: $('#editEmail' + memberId).val(),
        role: $('#editRole' + memberId).val(),
        // Add more fields as needed
    };

    // Extract the current page from the pagination links
    var currentPage = $('.pagination .active span').text();

    $.ajax({
        type: 'PUT',
        url: '/members-corporate/update/' + memberId + '?page=' + currentPage,
        data: formData,
        
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log('Member updated successfully:', response);

            // Check if the update was successful
            if (!response.error) {
                // Close the edit modal
                $('#editMemberModal' + memberId).modal('hide');

                // Update the table body with the new HTML content
                $('#membersCrudTableBody').html(response.updatedRowHtml);

                // Update the pagination links
                var paginationContainer = $('#paginationContainer');
                if (paginationContainer.length) {
                    paginationContainer.html(response.pagination);
                } else {
                    console.error('Pagination container not found');
                }
            } else {
                console.error('Error updating member:', response.error);
            }
        },
        error: function(error) {
            console.error('Error updating member:', error);
        }
    });
}



function deleteCorporateMember(memberId) {
    // Show a confirmation dialog
    if (confirm('Are you sure you want to delete this member?')) {
        // Extract the current page from the pagination links
        var currentPage = $('.pagination .active span').text();

        // Make an AJAX request to delete the member
        $.ajax({
            type: 'DELETE',
            url: '/members-corporate/delete/' + memberId + '?page=' + currentPage,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                // Update the content of the table with the new data
                $('#membersCrudTableBody').html(response.table_body);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }
}

 
</script>
