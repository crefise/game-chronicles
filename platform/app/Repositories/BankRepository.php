<?php

namespace App\Repositories;

use App\Models\Bank;
use App\Repositories\Interfaces\BankRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class BankRepository extends CoreRepository implements BankRepositoryInterface
{
    /**
     * Model class
     *
     * @return string
     */
    protected function model(): string
    {
        return Bank::class;
    }

    /**
     * Gets all banks
     *
     * @return Builder
     */
    public function index(): Builder
    {
        return $this->builder->with('settings');
    }

    /**
     * Find bank by id
     *
     * @param int $id
     * @return Bank
     */
    public function find(int $id): Bank
    {
        return $this->model->find($id);
    }
}
