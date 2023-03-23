<?php

namespace App\Repositories;

use App\Models\Performance;
use App\Repositories\Filters\Performance\SearchFilter;
use App\Repositories\Interfaces\PerformanceRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CoreRepository
{
    /**
     * Repository query
     *
     * @var ?Model
     */
    protected ?Model $model;

    /**
     * Repository query
     *
     * @var ?Builder
     */
    protected ?Builder $builder;

    /**
     * Array of criteria
     *
     * @var array
     */
    protected array $criteria = [];

    /**
     * Array of filters
     *
     * @var array
     */
    protected array $filters = [];

    public array $payload = [];

    /**
     * CoreRepository constructor
     */
    public function __construct()
    {
        $this->model = $this->model() ? app($this->model()): null;
        $this->builder = $this->model() ? $this->model::query() : null;
    }

    /**
     * Model class
     *
     * @return ?string
     */
    protected function model(): ?string
    {
        return null;
    }


    /**
     * Apply filters
     */
    public function applyFilters ()
    {
        foreach ($this->filters as $filter) {
            $this->builder = (new $filter())->filter($this->builder);
        }
    }

    /**
     * Apply criteria
     */
    public function applyCriteria()
    {
        foreach ($this->criteria as $criteria) {
            $this->builder = (new $criteria($this, $this->builder))();
        }
    }

    /**
     * Push criteria
     *
     * @param string $criteria
     * @param mixed $payload
     */
    public function pushCriteria(string $criteria, mixed $payload = null): void
    {
       array_push($this->criteria, $criteria);

       $this->payload = array_merge($this->payload, [$criteria => $payload]);
    }

    /**
     * Reset all repository
     *
     * @return $this
     */
    public function reset(): self
    {
        $this->criteria = [];
        $this->filters = [];
        $this->model = $this->model() ? app($this->model()): null;
        $this->builder = $this->model() ? $this->model::query() : null;

        return $this;
    }
}
