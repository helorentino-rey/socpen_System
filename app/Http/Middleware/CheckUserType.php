<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if user is authenticated and if their type matches the required role
        if (Auth::check() && Auth::user()->usertype === $role) {
            return $next($request);
        }

        // If user is not authenticated or doesn't have the required role, redirect or deny access
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}
