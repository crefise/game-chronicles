<?php

namespace App\Exceptions;

use App\Services\ResponseService\ResponseService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PermissionDeniedException extends Exception
{
    use ResponseService;
    /**
     * Render the exception as an HTTP response.
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'Permission denied',
            'type' => $this->FAILED_STATUS_SLUG
        ], Response::HTTP_FORBIDDEN);
    }
}
