<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClearCookies
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // TODO fix bug related unprotected route
        /*
         * If (cookie) -> check -> if correct okay -> if no delete
         */
        if (auth()->user() || true) {
            return $next($request);
        }

        // return $next($request)->withoutCookie('access_token');
    }
}
