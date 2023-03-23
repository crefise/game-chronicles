<?php

namespace App\Repositories\Criteria;


use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Builder;

abstract class CoreCriteria {
    /**
     * Payload
     *
     * @var mixed
     */
    protected mixed $payload;

    /**
     * CoreCriteria construct
     *
     * @param CoreRepository $repository
     * @param Builder $query
     */
    public function __construct(
        protected CoreRepository $repository,
        protected Builder $query,
    ) {
        $this->payload = $this->repository->payload[get_class($this)];
    }
}
