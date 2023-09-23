<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\FeatureRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\SubscriptionRepository;
use App\Interfaces\FeatureRepositoryInterface;
use App\Interfaces\SubscriptionRepositoryInterface;

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
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);

        $this->app->singleton(FeatureRepositoryInterface::class, FeatureRepository::class);

        $this->app->singleton(SubscriptionRepositoryInterface::class, SubscriptionRepository::class);
    }
}
