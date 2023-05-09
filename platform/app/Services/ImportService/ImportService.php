<?php

namespace App\Services\ImportService;

use App\Imports\Interfaces\GameImporterInterface;
use App\Models\Game;
use App\Models\Import;
use App\Services\CoreService;
use App\Services\ImportService\Traits\WorkWithImportRecord;
use Carbon\Carbon;
use Illuminate\Log\Logger;

class ImportService extends CoreService {
    const IN_PROGRESS_SLUG = 'in_progress';
    const SUCCESS_SLUG = 'success';
    const FAILED_SLUG = 'failed';
    /**
     * Traits
     */
    use WorkWithImportRecord;

    /**
     * Model class
     *
     * @return string
     */
    protected function model(): string
    {
        return Import::class;
    }
}
