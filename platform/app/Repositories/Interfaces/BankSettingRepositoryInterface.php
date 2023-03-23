<?php

namespace App\Repositories\Interfaces;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface BankSettingRepositoryInterface {
    /**
     * Get bank settings
     *
     * @param int $bankId
     * @param int $typeId
     * @return mixed
     */
    public function getBankSettings(int $bankId, int $typeId): Builder;
}
