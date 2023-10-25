<?php

namespace App\Repositories\Interfaces;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Builder;

interface UserRepositoryInterface {
    /**
     * Gets all games
     *
     * @return mixed
     */
    public function index(): Builder;

    /**
     * Gets all games
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id): Builder;
}
