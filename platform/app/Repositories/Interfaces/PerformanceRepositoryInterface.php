<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface PerformanceRepositoryInterface {
    /**
     * Gets all performances
     *
     * @return mixed
     */
    public function all(): Collection;
}
