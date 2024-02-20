<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminEditorOnly
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'editor')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}

