<?php

namespace App\Http\Middleware;

use App\Utilities\Constants;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSuperUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest() || Auth::user()->type != Constants::USERTYPES['SuperAdmin']) {
            return redirect()->guest('/login');
        }

        return $next($request);
    }
}
