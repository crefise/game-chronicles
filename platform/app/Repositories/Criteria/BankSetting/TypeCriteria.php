<?php

namespace App\Repositories\Criteria\BankSetting;

use App\Models\User;
use App\Repositories\Criteria\CoreCriteria;
use App\Repositories\Interfaces\BankSettingRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class TypeCriteria extends CoreCriteria {
    /**
     * TypeCriteria invoke
     *
     * @return Builder
     */
    public function __invoke(): Builder
    {
        return $this->query->where('type_id', $this->payload['typeId']);
    }
}
