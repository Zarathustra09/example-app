@extends('layouts.app')

@section('content')
<div class="table-responsive">
<h3>Members CRUD Table</h3>
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
        @include('partials.members_crud-table', ['members' => $members])
    </tbody>
</table>
</div>

@endsection
<!-- Add scripts for CRUD operations -->
<script>
    // Function to edit a member
    function updateMember(memberId) {
    // Implement logic to gather data from the form
    var formData = {
        name: $('#editName').val(),
        email: $('#editEmail').val(),
        // Add more fields as needed
    };

    // Make an AJAX request to update the member
    $.ajax({
        type: 'PUT',
        url: '/members/update/' + memberId,
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function(response) {
            // Handle success
            console.log('Member updated successfully:', response);

            // Close the edit modal
            $('#editMemberModal' + memberId).modal('hide');
        },
        error: function(error) {
            console.error('Error updating member:', error);
        }
    });
}



function deleteMember(memberId) {
    // Show a confirmation dialog
    if (confirm('Are you sure you want to delete this member?')) {
        // Make an AJAX request to delete the member
        $.ajax({
            type: 'DELETE',
            url: '/members/delete/' + memberId, // Replace with your actual route
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                // Update the content of the table with the new data
                $('#membersTableBody').html(response.table_body);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }
}


 
</script>
