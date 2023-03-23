<?php

namespace App\Repositories;

use App\Models\Performance;
use App\Repositories\Filters\Performance\SearchFilter;
use App\Repositories\Interfaces\PerformanceRepositoryInterface;
use Illuminate\Support\Collection;

class PerformanceRepository extends CoreRepository implements PerformanceRepositoryInterface
{
    /**
     * Repository class
     *
     * @return string
     */
    protected function model(): string
    {
        return Performance::class;
    }

    /**
     * Array of filters
     *
     * @var array|string[]
     */
    protected array $filters = [
        SearchFilter::class
    ];

    /**
     * Gets all performances
     *
     * @return Collection
     */
    public function all(): Collection
    {
        $this->applyFilters();

        return $this->builder->with('owner')->get();
    }
}
