<?php

namespace App\Services;

use App\Http\Requests\Performance\StoreRequest;
use App\Models\Performance;
use App\Models\User;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Log\Logger;

class CoreService {
    /**
     * Default logger key
     */
    protected string $LOGGER_KEY = 'Core Service | ';

    /**
     * @var ?Model
     */
    protected ?Model $model;

    /**
     * @var ?CoreRepository
     */
    protected  ?CoreRepository $repository;


    /**
     * Model string class
     *
     * @return ?string
     */
    protected function model(): ?string
    {
        return null;
    }

    /**
     * Model string class
     *
     * @return ?string
     */
    protected function repository(): ?string
    {
        return null;
    }

    /**
     * CoreService constructor
     *
     * @param Logger $logger
     */
    public function __construct(protected Logger $logger)
    {
        $this->model        = $this->model() ? app($this->model()) : null;
        $this->repository   = $this->repository() ? app($this->repository()): null;
    }

    /**
     * Error logging
     *
     * @param string $message
     * @param array|object $data
     */
    protected function logError(string $message, array|object $data = []): void
    {
        $this->logger->error($this->LOGGER_KEY . $message, $data);
    }

    /**
     * Info logging
     *
     * @param string $message
     * @param array|object $data
     */
    protected function logInfo(string $message, array|object $data = []): void
    {
        $this->logger->error($this->LOGGER_KEY . $message, $data);
    }
}
