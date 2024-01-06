@extends('layouts.app')

@section('content')
          
            <body>
                <div id="content">
                    <div class="container">
                        <h3 class="my-4">Corporate Approval</h3>

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