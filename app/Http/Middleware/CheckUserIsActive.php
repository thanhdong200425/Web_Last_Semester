<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckUserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $validationData = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (!$validationData) {
            return redirect()->back()->withErrors($validationData);
        }

        $user = DB::table('users')->where('username', $request->username)->first();

        if (empty($user))
            return redirect()->back()->with('error', 'User not found');

        if ($user->is_active === 0)
            return redirect()->back()->with('error', 'Your account is not active. Please contact admin to active your account');

        if ($user->role !== 0)
            return redirect()->back()->with('error', 'You are not admin');

        if ($user->password != $request->password)
            return redirect()->back()->with('error', 'Wrong password');

        return $next($request);
    }
}
