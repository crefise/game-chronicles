<?php

namespace App\Exceptions\BankSetting;

use App\Http\Responses\Response as ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MaxBillsCountException extends Exception
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
            'message' => 'Sorry but maximum of possible bills for this bank reached',
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
