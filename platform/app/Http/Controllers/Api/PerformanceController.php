<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Performance\FailedCreateException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Performance\StoreRequest;
use App\Http\Resources\PerformanceResource;
use App\Http\Responses\Performance\PerformanceResponse;
use App\Services\PerformanceService\PerformanceService;
use Illuminate\Http\JsonResponse;

class PerformanceController extends Controller
{
    /**
     * Index endpoint
     *
     * @param PerformanceService $service
     * @return JsonResponse
     */
    public function index(PerformanceService $service): JsonResponse
    {
        $performances = $service->index();

        return response()->json(PerformanceResource::collection($performances));
    }

    /**
     * Store performance endpoint
     *
     * @param StoreRequest $request
     * @param PerformanceService $performanceService
     * @param PerformanceResponse $performanceResponse
     * @return JsonResponse
     * @throws FailedCreateException
     */
    public function store(
        StoreRequest $request,
        PerformanceService $performanceService,
        PerformanceResponse $performanceResponse
    ): JsonResponse {
        $performance = $performanceService->store($request->all());

        if (!$performance) {
            throw new FailedCreateException();
        }

        return $performanceResponse->successStoreResponse();
    }
}
