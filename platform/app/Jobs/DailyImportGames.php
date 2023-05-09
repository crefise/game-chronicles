<?php

namespace App\Jobs;

use App\Services\ImportService\GameImportService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DailyImportGames implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Log prefix
     */
    const LOG_PREFIX = 'Daily import Games | ';

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            app(GameImportService::class)->setImporter()->importGames();

            logger(self::LOG_PREFIX . 'Jobs have been imported');
        } catch (\Exception $err) {
            logger(self::LOG_PREFIX . 'Jobs have not benn imported');
        }

    }
}
