<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, string $permission): mixed
    {
        if (!Auth::check()) {
            return redirect('login')->withSuccess('Opps! You do not have access');
        }

        $user = Auth::user();
        if ($user->hasPermissionTo($permission)) {
            return $next($request);
        }

        abort(403, 'You do not have the required permission.');
    }
}
