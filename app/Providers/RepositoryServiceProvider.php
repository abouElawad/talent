<?php

namespace App\Providers;

use App\Interfaces\AuthInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
      $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
      $this->app->bind(AuthInterface::class,AuthRepository::class);
      // $this->app->bind('App\Interfaces\UserRepositoryInterface','App\Repositories\UserRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
