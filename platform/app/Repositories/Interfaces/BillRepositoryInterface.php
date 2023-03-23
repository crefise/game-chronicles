<?php

namespace App\Repositories\Interfaces;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Builder;

interface BillRepositoryInterface {
    /**
     * Gets all performances
     *
     * @param int $userId
     * @return mixed
     */
    public function showUserBills(int $userId): Builder;


    /**
     * Get bills for user and bank
     *
     * @param int $userId
     * @param int $bankId
     * @return Builder
     */
    public function getBillsForUserAndBank(int $userId, int $bankId): Builder;

    /**
     * Get bill by number
     *
     * @param string $number
     * @return Bill
     */
    public function findByNumber(string $number): Bill;

}
