<?php

namespace App\Exceptions\Bill;

use App\Http\Responses\Response as ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class FailedCreateException extends Exception
{
    use ResponseTrait;

    /**
     * Render can't create exception
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'type' => $this->FAILED_STATUS_SLUG,
            'message' => 'Bill was not created',
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
