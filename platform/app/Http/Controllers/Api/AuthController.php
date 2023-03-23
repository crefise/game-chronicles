<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Responses\Auth\AuthResponse;
use App\Http\Responses\User\UserResponse;
use App\Services\AuthService\AuthService;
use App\Services\UserService\UserService;
use Illuminate\Http\JsonResponse;
use App\Exceptions\Auth\FailedLoginException;
use App\Exceptions\User\FailedCreateException;

class AuthController extends Controller
{
    /**
     * Login endpoint
     *
     * @param LoginRequest $request
     * @param AuthService $authService
     * @param AuthResponse $authResponse
     * @return JsonResponse
     * @throws FailedLoginException
     */
    public function login(
        LoginRequest $request,
        AuthService $authService,
        AuthResponse $authResponse
    ): JsonResponse
    {
        $token = $authService->loginUser($request->only('email', 'password'));

        return $authResponse->successLoginResponse($token);
    }

    /**
     * Registration endpoint
     *
     * @param StoreRequest $request
     * @param AuthService $authService
     * @param UserService $userService
     * @param AuthResponse $authResponse
     * @return JsonResponse
     * @throws FailedCreateException
     */
    public function registration (
        StoreRequest $request,
        AuthService $authService,
        UserService $userService,
        AuthResponse $authResponse
    ): JsonResponse
    {
        $token = $authService->registerAndLoginUser($request->all(), $userService);

        return $authResponse->successLoginResponse($token);
    }


    /**
     * Logout endpoint
     *
     * @param AuthService $authService
     * @param AuthResponse $authResponse
     * @return JsonResponse
     */
    public function logout(AuthService $authService, AuthResponse $authResponse): JsonResponse
    {
        $authService->logoutCurrentUser();

        return $authResponse->successLogoutResponse()->withoutCookie('access_token');
    }
}
