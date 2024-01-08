

@forelse ($corporateUsers as $user)
    <tr>
        <td>{{ $user->company_name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            <button class="btn btn-primary" data-toggle="modal" data-target="#userModal{{ $user->id }}">
                View
            </button>

            <!-- User Modal -->
            <div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="userModalLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userModalLabel{{ $user->id }}">Requirements for {{ $user->company_name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($user->registration_form)
                                <img src="{{ asset('storage/' . $user->registration_form) }}" alt="Registration Form" class="img-fluid mb-3">
                            @else
                                <p class="text-muted">No Registration Form</p>
                            @endif

                            @if ($user->proof_of_payment)
                                <img src="{{ asset('storage/' . $user->proof_of_payment) }}" alt="Proof of Payment" class="img-fluid">
                            @else
                                <p class="text-muted">No Proof of Payment</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="approveCorporateUser({{ $user->id }})" data-dismiss="modal">Approve</button>
                            <button type="button" class="btn btn-warning" onclick="deleteUser({{ $user->id }})" data-dismiss="modal">Disapprove</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3" class="text-center">No users found</td>
    </tr>
@endforelse
