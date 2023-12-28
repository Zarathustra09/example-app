@forelse ($members as $member)
    <tr>
        <td>{{ $member->name }}</td>
        <td>{{ $member->email }}</td>
        <td>
            <button class="btn btn-primary" data-toggle="modal" data-target="#viewMemberModal{{ $member->id }}">
                View
            </button>

            <!-- View Member Modal -->
            <div class="modal fade" id="viewMemberModal{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="viewMemberModalLabel{{ $member->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewMemberModalLabel{{ $member->id }}">Details for {{ $member->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Date of Registration:</strong> {{ $member->created_at->format('F j, Y') }}</p>
                            @if ($member->registration_form)
                            <img src="{{ asset('storage/' . $member->registration_form) }}" alt="Registration Form" class="img-fluid mb-3">
                             @else
                            <p class="text-muted">No Registration Form</p>
                             @endif

                             @if ($member->proof_of_payment)
                            <img src="{{ asset('storage/' . $member->proof_of_payment) }}" alt="Proof of Payment" class="img-fluid">
                             @else
                                <p class="text-muted">No Proof of Payment</p>
                             @endif
                            <!-- Add more details as needed -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <!-- Update and Delete Buttons -->
            <button class="btn btn-warning" onclick="updateMember({{ $member->id }})" data-toggle="modal" data-target="#editMemberModal{{ $member->id }}">
                Edit
            </button>
            <button class="btn btn-danger" onclick="deleteMember({{ $member->id }})">
                Delete
            </button>
        </td>
    </tr>

    <!-- Edit Member Modal -->
    <div class="modal fade" id="editMemberModal{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="editMemberModalLabel{{ $member->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMemberModalLabel{{ $member->id }}">Edit Member - {{ $member->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add a form for editing member details -->
                    <form id="editMemberForm{{ $member->id }}">
                        <div class="form-group">
                            <label for="editName">Name:</label>
                            <input type="text" class="form-control" id="editName" name="editName" value="{{ $member->name }}">
                        </div>
                        <div class="form-group">
                            <label for="editEmail">Email:</label>
                            <input type="email" class="form-control" id="editEmail" name="editEmail" value="{{ $member->email }}">
                        </div>
                        <!-- Add more fields as needed -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateMember({{ $member->id }})">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
@empty
    <tr>
        <td colspan="4" class="text-center">No members found</td>
    </tr>
@endforelse

