@extends('layouts.app')

@section('content')
    <!-- Include Approval Table -->
        <body>
            <div id = "content">
               <div class="container">
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
                            @include('partials.members_crud-table', ['approvedUsers' => $approvedUsers])
                        </tbody>
                    </table>
                </div>
               </div>
              
     
       
           </body>

  
 

   
@endsection
