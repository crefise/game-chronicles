<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Criteria\Transaction\ForUserCriteria;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Collection;

class TransactionRepository extends CoreRepository implements TransactionRepositoryInterface
{
    /**
     * Model class
     *
     * @return string
     */
    protected function model(): string
    {
        return Transaction::class;
    }

    /**
     * Get all transactions
     *
     * @param int $userId
     * @return Collection
     */
    public function all(int $userId): Collection
    {
        $this->pushCriteria(ForUserCriteria::class, ['$userId' => $userId]);

        $this->applyCriteria();

        return $this->builder;
    }
}
