<?php

namespace App\Repositories\Criteria\Transaction;

use App\Repositories\Criteria\CoreCriteria;
use Illuminate\Database\Eloquent\Builder;

class ForUserCriteria extends CoreCriteria {
    /**
     * ForUserCriteria invoke
     *
     * @return Builder
     */
    public function __invoke(): Builder
    {
        return $this->query->where('id', '>', 0);
    }
}
