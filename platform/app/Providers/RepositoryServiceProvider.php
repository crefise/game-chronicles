<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\GameRepository;
use App\Repositories\GameUserRepository;
use App\Repositories\Interfaces\GameRepositoryInterface;
use App\Repositories\Interfaces\GameUserRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
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
        GameRepositoryInterface::class,
        GameRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            GameUserRepositoryInterface::class,
            GameUserRepository::class
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
