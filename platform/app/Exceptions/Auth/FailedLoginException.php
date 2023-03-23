<?php

namespace App\Exceptions\Auth;

use App\Http\Responses\Response as ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FailedLoginException extends Exception
{
    use ResponseTrait;

    /**
     * Failed login response
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'type' => $this->FAILED_STATUS_SLUG,
            'message' => 'Email or password is incorrect',
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
