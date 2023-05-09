<?php

namespace App\Services\ImportService\Traits;

use App\Imports\Game\RAWGImporter;
use App\Imports\Interfaces\GameImporterInterface;
use App\Models\Import;
use App\Services\CoreService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Log\Logger;

trait WorkWithImportRecord {
    public function createImport ($importerId, $key, $description): Model
    {
        return $this->model->create([
            'key' => $key,
            'description' => $description,
            'status' => self::IN_PROGRESS_SLUG,
            'importer_id' => $importerId,
        ]);
    }

    public function setSuccessImport (Model $import): Model {
        $import->update([
            'status' => self::SUCCESS_SLUG
        ]);

        return $import;
    }

    public function setFailImport (Model $import): Model {
        $import->update([
            'status' => self::FAILED_SLUG
        ]);

        return $import;
    }
}
