<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Services\GameService\GameService;
use App\Services\UserGameService\UserGameService;
use Illuminate\Http\JsonResponse;

class GameUserController extends Controller
{
    /**
     * Get user games endpoint
     *
     * @param UserGameService $userGameService
     * @param int $id
     * @return JsonResponse
     */
    public function games(UserGameService $userGameService, int $id): JsonResponse
    {
        $games = $userGameService->index($id);

        return response()->json(GameResource::collection($games));
    }

    /**
     * Attach game to user
     */
    public function attach ()
    {
    }

    /**
     * Detach game from user
     */
    public function detach ()
    {
    }
}
