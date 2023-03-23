<?php

namespace App\Repositories;

use App\Models\Bank;
use App\Models\BankSettings;
use App\Repositories\Criteria\BankSetting\BankCriteria;
use App\Repositories\Criteria\BankSetting\TypeCriteria;
use App\Repositories\Interfaces\BankRepositoryInterface;
use App\Repositories\Interfaces\BankSettingRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BankSettingRepository extends CoreRepository implements BankSettingRepositoryInterface
{
    /**
     * Model class
     *
     * @return string
     */
    protected function model(): string
    {
        return BankSettings::class;
    }

    /**
     * Get bank settings
     *
     * @param int $bankId
     * @param int $typeId
     * @return mixed
     */
    public function getBankSettings(int $bankId, int $typeId): Builder
    {
        $this->pushCriteria(TypeCriteria::class, ['typeId' => $typeId]);
        $this->pushCriteria(BankCriteria::class, ['bankId' => $bankId]);

        $this->applyCriteria();

        return $this->builder;
    }

}
