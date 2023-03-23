<?php

namespace App\Http\Responses\Performance;

use App\Http\Responses\Response;
use Illuminate\Http\JsonResponse;

class PerformanceResponse {

    use Response;

    /**
     * Success create login
     *
     * @return JsonResponse
     */
    public function successStoreResponse(): JsonResponse
    {
        return response()->json([
            'type' => $this->SUCCESS_STATUS_SLUG,
            'message' => 'Performance has been created',
        ]);
    }
}
