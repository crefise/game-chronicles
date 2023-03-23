<?php

namespace App\Providers;

use App\Repositories\BankRepository;
use App\Repositories\BankSettingRepository;
use App\Repositories\BillRepository;
use App\Repositories\Interfaces\BankRepositoryInterface;
use App\Repositories\Interfaces\BankSettingRepositoryInterface;
use App\Repositories\Interfaces\BillRepositoryInterface;
use App\Repositories\Interfaces\PerformanceRepositoryInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Repositories\PerformanceRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*
            $this->app->bind(
            PerformanceRepositoryInterface::class,
            PerformanceRepository::class
        );*/
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
