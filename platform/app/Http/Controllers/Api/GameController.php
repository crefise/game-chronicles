<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Services\GameService\GameService;
use Illuminate\Http\JsonResponse;

class GameController extends Controller
{
    /**
     * Index endpoint
     *
     * @param GameService $gameService
     * @return JsonResponse
     */
    public function index(GameService $gameService): JsonResponse
    {
        $games = $gameService->index();

        return response()->json(GameResource::collection($games));
    }

    /**
     * Show end point
     *
     * @param GameService $gameService
     * @param int $id
     * @return JsonResponse
     */
    public function show(GameService $gameService, int $id): JsonResponse
    {
        $game = $gameService->show($id);

        return response()->json(new GameResource($game));
    }
}
