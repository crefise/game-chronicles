<?php

namespace App\Repositories\Criteria\Default;

use App\Repositories\Criteria\CoreCriteria;
use Illuminate\Database\Eloquent\Builder;

class ByIdCriteria extends CoreCriteria {
    /**
     * ByNumberCriteria invoke
     *
     * @return Builder
     */
    public function __invoke(): Builder
    {
        return $this->query->where('id', $this->payload['id']);
    }
}
