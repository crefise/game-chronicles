<?php

namespace App\Http\Responses\User;

use App\Http\Responses\Response;
use Illuminate\Http\JsonResponse;

class UserResponse {

    use Response;

    /**
     * Success create login
     *
     * @return JsonResponse
     */
    public function successCreateResponse(): JsonResponse
    {
        return response()->json([
            'type' => $this->SUCCESS_STATUS_SLUG,
            'message' => 'User has been created',
        ]);
    }
}
