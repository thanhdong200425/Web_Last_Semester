<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function show_form(Request $request)
    {
        return view('pages.sign-in');
    }

    public function authentiacte(Request $request)
    {
        //Create a new session
        
        $user = User::where('username', $request->username)->first();
        $request->session()->put('admin', $user);
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('sign-in');
    }
}
