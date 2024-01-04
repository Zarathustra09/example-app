<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\View;

class MembersCrudController extends Controller
{
   // Function to fetch all members for the table
   public function getAllMembers(Request $request)
   {
       $query = $request->get('query');

       $members = User::when($query, function ($queryBuilder) use ($query) {
               $queryBuilder->where(function ($innerQuery) use ($query) {
                   $innerQuery->where('name', 'like', '%' . $query . '%')
                       ->orWhere('email', 'like', '%' . $query . '%');
               });
           })
           ->paginate(10); // Change the number (10) based on your desired page size

       return view('sidebar_items.membersCrud', ['members' => $members]);
   }

   // Function to fetch a specific member for editing
   public function getMember($id)
   {
       $member = User::find($id); // Change this query based on your actual data structure

       return response()->json($member);
   }

 // Function to update a member
 public function updateMember(Request $request, $id)
 {
     $member = User::find($id);

     // Validate the request data
     $request->validate([
         'name' => 'required|string',
         'email' => 'required|email',
         // Add more validation rules as needed
     ]);

     // Update the member with the validated data
     $member->update($request->all());

     $perPage = 10;
     $members = User::paginate($perPage);

     // Render the updated row HTML
     $updatedRowHtml = View::make('partials.members_crud-table', ['members' => $members])->render();

     // Render the pagination links separately
     $pagination = $members->links()->toHtml();

     return response()->json(['updatedRowHtml' => $updatedRowHtml, 'pagination' => $pagination]);
 }

   // Function to delete a member
   public function deleteMember($id)
   {
       $member = User::find($id); // Change this query based on your actual data structure
   
       // Delete the member
       $member->delete();
   
       // Fetch paginated members
       $members = User::paginate(10); // Change the number based on your actual pagination limit
   
       return response()->json(['table_body' => view('partials.members_crud-table', ['members' => $members])->render()]);
   }
   

   public function searchMembers(Request $request)
   {
       $search = $request->input('search');

       // Perform the search query
       $members = User::where('name', 'LIKE', "%$search%")
                     ->orWhere('email', 'LIKE', "%$search%")
                     ->paginate(10);

       return view('sidebar_items.membersCrud', ['members' => $members]);
   }


}
