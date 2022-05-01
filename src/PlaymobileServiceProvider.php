<?php

namespace Firefoxuz\LaravelPlaymobile;

use Illuminate\Support\ServiceProvider;

class PlaymobileServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/config/playmobile.php' => config_path('playmobile.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/playmobile.php', 'playmobile'
        );

        $this->app->singleton('playmobile', function () {
            return new Playmobile;
        });
    }
}
