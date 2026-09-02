<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountLogin
{
  public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('auth.accountlogin');  // Redirect to login if not logged in
        }

        $user = Auth::user();

        // If user is admin (role_id = 1), allow access to all routes
        if ((int)$user->role_id === 1) {
            return $next($request);  // Admin is allowed to access any route
        }

        // If user is patient (role_id = 2), redirect to the home/welcome page
        if ((int)$user->role_id === 2) {
            return redirect()->route('welcome');  // Redirect patient to /welcome page
        }

        // If no valid role, log out and redirect to login page
        Auth::logout();
        return redirect()->route('auth.accountlogin')->withErrors(['error' => 'Unauthorized access']);
    }
}
