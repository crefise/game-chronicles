<?php

namespace App\Repositories;

use App\Models\Bill;
use App\Repositories\Criteria\Bill\ByNumberCriteria;
use App\Repositories\Criteria\Bill\ForBankCriteria;
use App\Repositories\Criteria\Bill\ForUserCriteria;
use App\Repositories\Interfaces\BillRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class BillRepository extends CoreRepository implements BillRepositoryInterface
{
    /**
     * Model class
     *
     * @return string
     */
    protected function model(): string
    {
        return Bill::class;
    }

    /**
     * Gets all performances
     *
     * @return Builder
     */
    public function showUserBills(int $userId): Builder
    {
        $this->pushCriteria(ForUserCriteria::class, ['userId' => $userId]);

        $this->applyCriteria();

        return $this->builder;
    }

    /**
     * Get bills for user and bank
     *
     * @param int $userId
     * @param int $bankId
     * @return Builder
     */
    public function getBillsForUserAndBank(int $userId, int $bankId): Builder
    {
        $this->pushCriteria(ForUserCriteria::class, ['userId' => $userId]);
        $this->pushCriteria(ForBankCriteria::class, ['bankId' => $bankId]);

        $this->applyCriteria();

        return $this->builder;
    }

    /**
     * Get bill by number
     *
     * @param string $number
     * @return Bill
     */
    public function findByNumber(string $number): Bill
    {
        $this->pushCriteria(ByNumberCriteria::class, ['number' => $number]);

        $this->applyCriteria();

        return $this->builder->first();
    }
}
