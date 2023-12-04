<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    //
    public function show_form(Request $request)
    {
        return view('pages.sign-in');
    }

    public function authenticate(Request $request)
    {
        // Authenticate the user with remember function
        $user = User::authenticateUser($request->username, $request->password);
        if ($user) {
            session()->put('admin', $user);
            if ($request->filled('remember')) {
                return redirect()->route('dashboard')->withCookie('admin', $user->remember_token, 60);
            }
            return redirect()->route('dashboard');
        }

        // Authentication failed...
        return redirect()->back()->with('error', 'Wrong username or password');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('sign-in')->withCookie(Cookie::forget('admin'));
    }
}
