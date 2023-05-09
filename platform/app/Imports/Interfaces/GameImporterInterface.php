<?php

namespace App\Imports\Interfaces;

use App\Models\Import;
use App\Services\CoreService;

interface GameImporterInterface {
    /**
     * Get games from api
     *
     * @return mixed
     */
    public function games(): array;

    /**
     * Get game from api
     *
     * @return array
     */
    public function game(): array;

    /**
     * Importer model
     *
     * @return string
     */
    public function model(): string;
}
