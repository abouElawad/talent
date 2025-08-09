<?php

namespace App\Providers;

use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\StaffInterface;
use Illuminate\Support\ServiceProvider;
use App\Http\Interfaces\UserRepositoryInterface;
use App\Http\Repositories\AuthRepository;
use App\Http\Repositories\StaffRepository;
use App\Http\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
      $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
      $this->app->bind(AuthInterface::class,AuthRepository::class);
      $this->app->bind(StaffInterface::class,StaffRepository::class);
      // $this->app->bind('App\Interfaces\UserRepositoryInterface','App\Repositories\UserRepository');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
