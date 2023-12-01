<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('admin')) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'You have to login before');
    }
}
