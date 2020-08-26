<?php


namespace KMA\IikoApi;

use Illuminate\Support\ServiceProvider;

class IikoServiceProvider extends ServiceProvider
{
    /** Boot the service provider. */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/iiko.php' => config_path('iiko.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/iiko.php', 'iiko');

        // Register the main class to use with the facade
        $this->app->bind('Iiko', function ($app) {
            $config = app('config')->get('iiko');
            return new Iiko($config);
        });
    }
}
