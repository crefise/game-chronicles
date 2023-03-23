<?php

namespace App\Repositories\Filters\Performance;

use Illuminate\Database\Eloquent\Builder;

class SearchFilter
{
    /**
     * Filter
     *
     * @param Builder $query
     * @return Builder
     */
    public function filter(Builder $query): Builder
    {
        $search = request()->query('search');

        return $query->where('label', 'like',  "%$search%");
    }
}
