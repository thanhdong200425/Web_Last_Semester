<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function show_form()
    {
        return view('pages.sign-in');
    }

    public function authentiacte(Request $request)
    {
        $col = 'username';
        $credentials = $request->only('username', 'password');
        $user = User::where($col, $credentials['username'])->first();
        if (empty($user)) {
            return redirect()->back()->with('error', 'User not found');
        }
        if ($user->password != $credentials['password']) {
            return redirect()->back()->with('error', 'Wrong password');
        }
        if ($user->role != 0) 
        {
            return redirect()->back()->with('error', 'You are not admin');
        }
        return redirect()->route('dashboard');
    }
    public function show_form_sign_up()
    {
        return view('pages.sign-up');
    }
}
