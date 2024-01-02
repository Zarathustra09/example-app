<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\UserApprovedNotification;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function showAdminDashboard(Request $request)
    {
        $query = request()->get('query');

        $users = User::where('approved', 0)
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where(function ($innerQuery) use ($query) {
                    $innerQuery->where('name', 'like', '%' . $query . '%')
                        ->orWhere('email', 'like', '%' . $query . '%');
                });
            })
            ->paginate(10); // Use paginate instead of get

            if ($request->ajax()) {
                return view('partials.approval-table', compact('users'))->render();
            }

        return view('admin', compact('users'));
    }

    public function approveUser($userId)
    {
        $user = User::find($userId);
        
        if ($user) {
            $user->approved = 1;
            $user->save();
        }
    
        $perPage = 10; // Set your desired number of items per page
        $users = User::where('approved', 0)->paginate($perPage);
    
        // You can use the approval-table partial view to render the table body
        $tableBody = View::make('partials.approval-table', ['users' => $users])->render();
    
        $user->notify(new UserApprovedNotification);
    
        return response()->json(['table_body' => $tableBody, 'pagination' => $users->links()]);
    }
    

    public function showApprovedUsers()
    {
        $approvedUsers = User::where('approved', 1)->get();

        return view('sidebar_items.membersCrud', compact('approvedUsers'));
    }

   
}
