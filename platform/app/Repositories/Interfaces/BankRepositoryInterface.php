<?php

namespace App\Repositories\Interfaces;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface BankRepositoryInterface {
    /**
     * Gets all performances
     *
     * @return Builder
     */
    public function index(): Builder;

    /**
     * Find bank by id
     *
     * @param int $id
     * @return Bank
     */
    public function find(int $id): Bank;
}
