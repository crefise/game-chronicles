<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BankResource;
use App\Services\BankService\BankService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BankController extends Controller
{
    /**
     * Gets bank endpoint
     *
     * @param BankService $bankService
     * @return AnonymousResourceCollection
     */
    public function index(BankService $bankService): AnonymousResourceCollection
    {
        $banks = $bankService->index();

        return BankResource::collection($banks);
    }
}
