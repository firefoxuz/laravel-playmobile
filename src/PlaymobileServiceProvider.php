<?php

namespace Firefoxuz\LaravelPlaymobile;

use Firefoxuz\LaravelPlaymobile\Http\Json\Main;
use Firefoxuz\LaravelPlaymobile\Http\Json\Message;
use Firefoxuz\LaravelPlaymobile\Http\Json\Variable;
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
        $this->publishes([
            __DIR__ . '/config/playmobile.php' => config_path('playmobile.php'),
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
            __DIR__ . '/config/playmobile.php', 'playmobile'
        );

        $this->app->singleton(Playmobile::class, function () {
            return new Playmobile;
        });

        $this->app->bind(Message::class, function () {
            return new Message;
        });

        $this->app->bind(Main::class, function () {
            return new Main;
        });

        $this->app->bind(Variable::class, function () {
            return new Variable;
        });
    }
}
