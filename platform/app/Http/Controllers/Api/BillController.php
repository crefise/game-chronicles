<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Bill\Operations\NotEnoughMoneyForTakeException;
use App\Http\Controllers\Controller;
use App\Http\Resources\BillResource;
use App\Http\Resources\TransactionResource;
use App\Http\Responses\Bill\BillResponse;
use App\Services\BillService\BillService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BillController extends Controller
{
    /**
     * Show user bills endpoint
     *
     * @param BillService $billService
     * @return AnonymousResourceCollection
     */
    public function show(BillService $billService): AnonymousResourceCollection
    {
        $bills = $billService->showUserBills();

        return BillResource::collection($bills);
    }


    /**
     * Store new bill endpoint
     *
     * @param BillResponse $billResponse
     * @param BillService $billService
     * @return JsonResponse
     */
    public function store(
        BillResponse $billResponse,
        BillService $billService
    ): JsonResponse {
        $billService->store(request()->all());

        return $billResponse->successStoreResponse();
    }

    /**
     * Transfer money
     *
     * @param BillService $billService
     * @return TransactionResource
     * @throws NotEnoughMoneyForTakeException
     */
    public function transfer(BillService $billService): TransactionResource
    {
        $transaction = $billService->transferMoney(request()->all());

        return new TransactionResource($transaction);
    }
}
