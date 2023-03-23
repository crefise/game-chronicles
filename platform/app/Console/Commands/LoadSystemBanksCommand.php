<?php

namespace App\Console\Commands;

use App\Models\Bank;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LoadSystemBanksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bank:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load banks from JSON';

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
     * @return int
     */
    public function handle()
    {
        $banks = json_decode(Storage::get('banks.json'));

        array_map(function ($bank) {
            Bank::create([
                'name' => $bank->name,
                'slug' => $bank->slug
            ]);
        }, $banks);

    }
}
