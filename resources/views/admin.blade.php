@extends('layouts.app')

@section('content')
    
            @extends("layouts\sidebar")
            <div class="container">
                <h2>Admin Dashboard</h2>
        
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#userModal{{ $user->id }}">
                                        View Images
                                    </button>
        
                                    <!-- User Modal -->
                                    <div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="userModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="userModalLabel{{ $user->id }}">Images for {{ $user->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($user->registration_form)
                                                        <img src="{{ asset('storage/' . $user->registration_form) }}" alt="Registration Form" width="100">
                                                    @else
                                                        No Registration Form
                                                    @endif
        
                                                    @if ($user->proof_of_payment)
                                                        <img src="{{ asset('storage/' . $user->proof_of_payment) }}" alt="Proof of Payment" width="100">
                                                    @else
                                                        No Proof of Payment
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success" onclick="approveUser({{ $user->id }})">Approve</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
            <script>
                function approveUser(userId) {
                    // You can make an AJAX request to update the approval status
                    // Here, I'm using a simplified approach for demonstration purposes
                    window.location = '/admin/approve-user/' + userId;
                }
            </script>
@endsection