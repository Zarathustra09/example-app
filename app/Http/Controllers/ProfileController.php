<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user(); // Get the authenticated user

        return view('sidebar_items.profile', ['user' => $user]);
    }
}