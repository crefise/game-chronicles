<?php

namespace App\Repositories\Criteria\Bill;

use App\Repositories\Criteria\CoreCriteria;
use Illuminate\Database\Eloquent\Builder;

class ByNumberCriteria extends CoreCriteria {
    /**
     * ByNumberCriteria invoke
     *
     * @return Builder
     */
    public function __invoke(): Builder
    {
        return $this->query->where('number', $this->payload['number']);
    }
}
