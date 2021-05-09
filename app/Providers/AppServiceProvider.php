<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\TripRepositoryInterface',
            'App\Repository\TripRepository'
        );
        $this->app->bind(
            'App\Repository\BookingRepositoryInterface',
            'App\Repository\BookingRepository'
        );

        $this->app->bind(
            'App\Services\TripServiceInterface',
            'App\Services\TripService'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
