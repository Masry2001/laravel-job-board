<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyAdmins
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure the user is logged in and is the admin
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->email !== 'ah@gmail.com') {
            abort(403, 'You must be an admin to access this page.');
        }

        // Allow admin to access the page
        return $next($request);
    }
}
