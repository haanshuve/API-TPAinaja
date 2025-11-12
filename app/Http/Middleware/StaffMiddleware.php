<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaffMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role === 'staff') {
            return $next($request);
        }

        return redirect()->route('admin.dashboard');  // Redirect to admin dashboard
    }
}
