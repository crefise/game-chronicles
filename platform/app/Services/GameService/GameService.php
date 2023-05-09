<?php

namespace App\Services\GameService;

use App\Exceptions\User\FailedCreateException;
use App\Models\Game;
use App\Models\User;
use App\Models\UserProfile;
use App\Repositories\Interfaces\GameRepositoryInterface;
use App\Services\AuthService\AuthService;
use App\Services\CoreService;
use App\Services\RolesAndPermissionsService\RolesAndPermissionsService;
use App\Services\UserProfileService\UserProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Log\Logger;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GameService extends CoreService {
    /**
     * Model
     *
     * @return string
     */
    protected function model(): string
    {
        return Game::class;
    }

    /**
     * Model string class
     *
     * @return string
     */
    protected function repository(): string
    {
        return GameRepositoryInterface::class;
    }

    /**
     * Get game list
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->repository->index()->get();
    }

    /**
     * Get game list
     *
     * @param int $id
     * @return Game
     */
    public function show(int $id): Game
    {
        return $this->repository->show($id)->first();
    }
}
