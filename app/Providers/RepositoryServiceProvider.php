<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Interfaces\AuthRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(AuthRepositoryInterface::class, AuthRepository::class);
    }
}
