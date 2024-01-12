<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserProfileController extends Controller
{
    public function show(User $user): View
    {
        return view('user.profile', ['user' => $user]);
    }

    public function promote(User $user)
    {
        $user->is_admin = true;
        $user->save();
    
        return redirect()->back()->with('status', 'User promoted to admin successfully.');
    }
}
