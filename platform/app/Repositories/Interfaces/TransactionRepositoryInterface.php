<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface TransactionRepositoryInterface {
    /**
     * Gets all transactions
     *
     * @return mixed
     */
    public function all(int $userId): Collection;
}
