<?php

namespace App\Imports\Game;

use App\Imports\Interfaces\GameImporterInterface;
use App\Models\Game;
use Illuminate\Support\Facades\Http;

class RAWGImporter implements GameImporterInterface {
    /**
     * Importer id
     */
    const ID = 1;

    private array $payload;

    /**
     * RAWGImporter construct
     */
    public function __construct () {
        $this->payload['url'] = 'https://api.rawg.io/api/games';
        $this->payload['key'] = 'faac20a6bce74216b2ffd38c253a0bc9';
    }

    /**
     * Format url
     *
     * @return string
     */
    public function formatUrl (): string
    {
        return $this->payload['url'] . '?key=' . $this->payload['key'];
    }

    /**
     * Make request
     *
     * @return array
     */
    public function makeRequest (): array
    {
        $requestUrl = $this->formatUrl();

        return Http::get($requestUrl)->json();
    }

    /**
     * Get games from api
     */
    public function games(): array
    {
        return $this->makeRequest()['results'];
    }

    /**
     * Get game form api
     * @return string[]
     */
    public function game(): array
    {
        return ['Game1'];
    }

    /**
     * Model
     * @return string
     */
    public function model (): string {
        return Game::class;
    }
}
