<?php

namespace App\Repositories;


use App\Models\Game;
use App\Repositories\Interfaces\GameUserRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class GameUserRepository extends CoreRepository implements GameUserRepositoryInterface
{
    /**
     * Model class
     *
     * @return string
     */
    protected function model(): string
    {
        return Game::class;
    }

    /**
     * Gets all games
     *
     * @return Builder
     */
    public function index(int $userId): Builder
    {
        $userRepository = app(UserRepositoryInterface::class);

        return $userRepository->show($userId)->first()->games()->getQuery();
    }
}
