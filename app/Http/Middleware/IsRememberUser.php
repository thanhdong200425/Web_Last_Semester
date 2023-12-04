<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IsRememberUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasCookie('admin')) {
            $user = User::where('remember_token', $request->cookie('admin'))->first();
            if ($user) {
                session()->put('admin', $user);
                return redirect()->route('dashboard')->with('message', "Welcome Back, {$user->username}");
            }
        }

        return $next($request);

    }
}
