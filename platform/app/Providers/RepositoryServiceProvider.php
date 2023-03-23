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
        $this->app->bind(
            PerformanceRepositoryInterface::class,
            PerformanceRepository::class
        );

        $this->app->bind(
            BillRepositoryInterface::class,
            BillRepository::class
        );

        $this->app->bind(
            BankRepositoryInterface::class,
            BankRepository::class
        );

        $this->app->bind(
            BankSettingRepositoryInterface::class,
            BankSettingRepository::class
        );

        $this->app->bind(
            TransactionRepositoryInterface::class,
            TransactionRepository::class
        );
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
