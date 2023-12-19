<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MembersCrudController extends Controller
{
    public function deleteUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
        }

        $users = User::where('approved', 0)->get();

        return response()->json(['table_body' => view('partials.approval-table', compact('users'))->render()]);
    }


    public function deleteMember($memberId)
    {
        // Implement logic to delete the member
        $member = User::find($memberId);
        if ($member) {
            $member->delete();
        }

        // Get updated data for the table
        $members = User::all(); // Update this query based on your needs

        // Render the table body and return as JSON
        $tableBody = view('partials.members_crud-table', ['members' => $members])->render();
        return response()->json(['table_body' => $tableBody]);
    }

    public function updateMember(Request $request, $memberId)
    {
        // Implement logic to update the member
        $member = User::find($memberId);
        if ($member) {
            $member->update($request->all());
        }

        // Get updated data for the table
        $members = User::all(); // Update this query based on your needs

        // Render the table body and return as JSON
        $tableBody = view('partials.members_crud-table', ['members' => $members])->render();
        return response()->json(['table_body' => $tableBody]);
    }

    public function showMembersCrud()
    {
        // Implement logic to fetch members data
        $members = User::all(); // Update this query based on your needs

        return view('sidebar_items.membersCrud', ['members' => $members]);
    }
}
