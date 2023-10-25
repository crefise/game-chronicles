<?php

namespace App\Repositories;


use App\Models\Game;
use App\Models\User;
use App\Repositories\Criteria\Default\ByIdCriteria;
use App\Repositories\Interfaces\GameRepositoryInterface;
use App\Repositories\Interfaces\UserGameRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class UserRepository extends CoreRepository implements UserRepositoryInterface
{
    /**
     * Model class
     *
     * @return string
     */
    protected function model(): string
    {
        return User::class;
    }

    /**
     * Gets all games
     *
     * @return mixed
     */
    public function index(): Builder
    {
        return $this->builder;
    }

    /**
     * Get game by id
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id): Builder
    {
        $this->pushCriteria(ByIdCriteria::class, ['id' => $id]);

        $this->applyCriteria();

        return $this->builder;
    }
}
