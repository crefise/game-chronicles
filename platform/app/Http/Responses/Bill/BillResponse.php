<?php

namespace App\Http\Responses\Bill;

use App\Http\Responses\Response;
use Illuminate\Http\JsonResponse;

class BillResponse {

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
            'message' => 'Bill has been created',
        ]);
    }
}
