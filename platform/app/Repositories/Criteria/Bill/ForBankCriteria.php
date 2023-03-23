<?php

namespace App\Repositories\Criteria\Bill;

use App\Repositories\Criteria\CoreCriteria;
use Illuminate\Database\Eloquent\Builder;

class ForBankCriteria extends CoreCriteria {
    /**
     * ForBankCriteria invoke
     *
     * @return Builder
     */
    public function __invoke(): Builder
    {
        return $this->query->where('bank_id', $this->payload['bankId']);
    }
}
