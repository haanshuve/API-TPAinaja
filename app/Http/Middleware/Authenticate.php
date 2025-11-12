<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * If the request expects JSON (API), throw an AuthenticationException so Laravel
     * returns a 401 JSON response. Otherwise, redirect to appropriate login route
     * based on the URL prefix (admin / staff), defaulting to staff login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // If no specific guards are passed, use the default 'web' guard
        if (empty($guards)) {
            $guards = ['web']; // Default guard if none specified
        }

        // If the request is expecting JSON or is an API route, we throw an exception
        if ($request->expectsJson() || $request->is('api/*')) {
            // Try to check against the default guard (typically 'api' or 'web' if not specified)
            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    return $next($request);
                }
            }

            throw new AuthenticationException('Unauthenticated.', $guards);
        }

        // Handle web authentication with different guards like 'admin' or 'staff'
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $next($request);  // Proceed if authenticated
            }
        }

        // Default check for the default guard ('web')
        if (Auth::check()) {
            return $next($request);
        }

        // If we still haven't returned, we redirect the user
        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->route('admin.login');
        }

        if ($request->is('staff') || $request->is('staff/*')) {
            return redirect()->route('staff.login');
        }

        // Fallback to default login route if no match found
        return redirect()->route('staff.login');
    }
}
