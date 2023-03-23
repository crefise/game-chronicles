<?php

namespace App\Repositories\Criteria\Bill;

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
        return $this->query->where('user_id', $this->payload['userId']);
    }
}
