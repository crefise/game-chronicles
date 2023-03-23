<?php

namespace App\Http\Responses\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Responses\Response;

class AuthResponse {

    use Response;

    /**
     * Success login response
     *
     * @param $token
     * @return JsonResponse
     */
    public function successLoginResponse($token): JsonResponse
    {
        return response()->json([
            'type'    => $this->SUCCESS_STATUS_SLUG,
            'message' => 'Has been logged in',
            'token'   => $token,
            'url'     => route('dashboard'),
        ])->cookie('access_token', $token, null, null, null, false, false);
    }

    /**
     * Success logout response
     *
     * @return JsonResponse
     */
    public function successLogoutResponse(): JsonResponse
    {
        return response()->json([
            'type'    => $this->SUCCESS_STATUS_SLUG,
            'message' => 'Was logged out',
            'url'     => route('auth.login'),
        ]);
    }
}
