<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OpenWeatherResource;
use App\Resources\OpenWeatherResourceInterface;
use App\Services\FourSquareResource;
use App\Resources\FourSquareResourceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(OpenWeatherResourceInterface::class, OpenWeatherResource::class);
        $this->app->bind(FourSquareResourceInterface::class, FourSquareResource::class);
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
