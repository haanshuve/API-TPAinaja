<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaffMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var \App\Models\User|null $user */
        $user = $request->user();

        if ($user && $user->role === 'staff') {
            return $next($request);
        }

        return redirect()->route('admin.dashboard');
    }
}
