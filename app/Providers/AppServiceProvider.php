<?php

namespace App\Providers;

use App\Repository\DepartureRepository;
use App\RepositoryInterface\DepartureRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DepartureRepositoryInterface::class, DepartureRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
