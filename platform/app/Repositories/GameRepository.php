<?php

namespace App\Repositories;


use App\Models\Game;
use App\Repositories\Criteria\Default\ByIdCriteria;
use App\Repositories\Interfaces\GameRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class GameRepository extends CoreRepository implements GameRepositoryInterface
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
