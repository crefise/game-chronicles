<?php

namespace App\Http\Middleware;

use App\Exceptions\PermissionDeniedException;
use App\Providers\RouteServiceProvider;
use App\Services\ResponseService\ResponseService;
use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class UserHasRole
{
    use ResponseService;

    /**
     * Handle role middleware
     *
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @return Application|RedirectResponse|Redirector|JsonResponse
     * @throws PermissionDeniedException
     */
    public function handle(Request $request, Closure $next, $role): Application|RedirectResponse|Redirector|JsonResponse
    {
        if (Auth::user()->hasRole($role)) {
            if ($request->expectsJson()) {
                throw new PermissionDeniedException();
            }

            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
