<?php

namespace App\Services\UserGameService;

use App\Exceptions\User\FailedCreateException;
use App\Models\Game;
use App\Models\User;
use App\Models\UserGame;
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

class UserGameService extends CoreService {
    /**
     * Model
     *
     * @return string
     */
    protected function model(): string
    {
        return UserGame::class;
    }

    /**
     * Model string class
     *
     * @return string
     */
    protected function repository(): ?string
    {
        return null;
    }
}
