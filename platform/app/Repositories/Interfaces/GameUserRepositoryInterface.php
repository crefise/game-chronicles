<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface GameUserRepositoryInterface {
    /**
     * Gets all user games
     *
     * @return mixed
     */
    public function index(int $userId): Builder;
}
