<?php

namespace App\Services\ImportService;

use App\Imports\Interfaces\GameImporterInterface;
use App\Models\Import;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property @id
 */
class GameImportService extends ImportService {
    /**
     * Game importer
     *
     * @var GameImporterInterface
     */
    private GameImporterInterface $importer;

    /**
     * Import model
     *
     * @var Model
     */
    private Model $import;

    /**
     * Imports games and saves it in database
     */
    public function importGames($reason = ''): Model
    {
        // TODO add error handler

        $this->import = $this->createImport($this->importer::ID, '', $reason);

        $gamesData = $this->importer->games();

        $this->saveGames($gamesData);

        $this->setSuccessImport($this->import);

        return $this->import;
    }

    /**
     * Set importer
     *
     * @param ?string $importer
     * @return self
     */
    public function setImporter (string $importer = null): self
    {
        if (!$importer) {
            $importer = config('import.imports.game.default');
        }

        $this->importer = new $importer();

        return $this;
    }

    /**
     * Save array of games to database
     *
     * @param array $games
     */
    public function saveGames (array $games) {
        foreach ($games as $game) {
            $this->importer->model()::create([
                'name'         => $game['name'],
                'key'          => $game['slug'],
                'release_date' => Carbon::parse($game['released']),
                'ext_id'       => $game['id'],
                'image'        => $game['background_image'],
                'import_id'    => $this->import->id,
            ]);
        }
    }
}
