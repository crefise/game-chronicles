<?php

namespace App\Exceptions\Bill\Operations;

use App\Http\Responses\Response as ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class NotEnoughMoneyForTakeException extends Exception
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
            'message' => 'Not enough money to send',
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
