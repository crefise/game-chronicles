<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\User\FailedCreateException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Responses\User\UserResponse;
use App\Services\UserService\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Store endpoint
     *
     * @param StoreRequest $request
     * @param UserService $userService
     * @param UserResponse $userResponse
     * @return JsonResponse
     * @throws FailedCreateException
     */
    public function store(
        StoreRequest $request,
        UserService $userService,
        UserResponse $userResponse
    ): JsonResponse {
        $userService->store($request->toArray());

        return $userResponse->successCreateResponse();
    }
}
