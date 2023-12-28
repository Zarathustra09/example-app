<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
       $member = User::find($id); // Change this query based on your actual data structure

       // Validate the request data
       $request->validate([
           'name' => 'required|string',
           'email' => 'required|email',
           // Add more validation rules as needed
       ]);

       // Update the member with the validated data
       $member->update($request->all());

       // Fetch all members to refresh the table
       $members = User::all(); // Change this query based on your actual data structure

       return response()->json(['table_body' => view('partials.members_crud-table', ['members' => $members])->render()]);
   }

   // Function to delete a member
   public function deleteMember($id)
   {
       $member = User::find($id); // Change this query based on your actual data structure

       // Delete the member
       $member->delete();

       // Fetch all members to refresh the table
       $members = User::all(); // Change this query based on your actual data structure

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
