<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\FeatureRepository;
use App\Repositories\SubscriptionRepository;
use App\Interfaces\FeatureRepositoryInterface;
use App\Interfaces\PostAttachmentRepositoryInterface;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\ProfileRepositoryInterface;
use App\Interfaces\SubscriptionRepositoryInterface;
use App\Repositories\PostAttachmentRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProfileRepository;

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

        $this->app->singleton(CategoryRepositoryInterface::class , CategoryRepository::class);

        $this->app->singleton(FeatureRepositoryInterface::class, FeatureRepository::class);

        $this->app->singleton(SubscriptionRepositoryInterface::class, SubscriptionRepository::class);

        $this->app->singleton(ProfileRepositoryInterface::class, ProfileRepository::class);

        $this->app->singleton(PostRepositoryInterface::class, PostRepository::class);

        $this->app->singleton(PostAttachmentRepositoryInterface::class, PostAttachmentRepository::class);
    }
}
