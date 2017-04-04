<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAjax
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->expectsJson()) {
            return response([
                'error' => [
                    'message'     => 'Forbidden',
                    'status_code' => 403,
                ],
            ], 403);
        }

        return $next($request);
    }
}
