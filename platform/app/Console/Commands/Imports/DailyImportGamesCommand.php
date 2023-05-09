<?php

namespace App\Console\Commands\Imports;

use App\Jobs\DailyImportGames;
use Illuminate\Bus\Dispatcher;
use Illuminate\Console\Command;

class DailyImportGamesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:import:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily games import';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $job = app(DailyImportGames::class);

        app(Dispatcher::class)->dispatch($job);
    }
}
