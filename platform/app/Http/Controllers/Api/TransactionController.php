<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TransactionService\TransactionService;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    /**
     * Show transactions endpoint
     *
     * @param TransactionService $transactionService
     * @return JsonResponse
     */
    public function index(TransactionService $transactionService): JsonResponse
    {
        $transactions = $transactionService->index();

        return response()->json($transactions->toArray());
    }
}
