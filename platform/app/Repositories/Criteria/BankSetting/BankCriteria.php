<?php

namespace App\Repositories\Criteria\BankSetting;

use App\Repositories\Criteria\CoreCriteria;
use Illuminate\Database\Eloquent\Builder;

class BankCriteria extends CoreCriteria {
    /**
     * BankCriteria invoke
     *
     * @return Builder
     */
    public function __invoke(): Builder
    {
        return $this->query->where('bank_id', $this->payload['bankId']);
    }
}
