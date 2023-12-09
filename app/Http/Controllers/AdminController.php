<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function showAdminDashboard()
    {
        $users = User::where('approved', 0)->get();

        return view('admin', compact('users'));
    }

    public function approveUser($userId)
    {
            //\DB::enableQueryLog();

            $user = User::find($userId);

            if ($user) {
                $user->approved = 1;
                $user->save();
            }

            //dd(\DB::getQueryLog());

            return redirect()->route('admin.dashboard');
    }
}
