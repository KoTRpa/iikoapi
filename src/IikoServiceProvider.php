<?php


namespace KMA\IikoApi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container as Application;

class IikoServiceProvider extends ServiceProvider
{
    /** @var bool Indicates if loading of the provider is deferred. */
    protected $defer = true;

    /** Boot the service provider. */
    public function boot()
    {
        $this->setupConfig($this->app);
    }

    /**
     * Setup the config.
     *
     * @param Application $app
     */
    protected function setupConfig(Application $app)
    {
        $source = __DIR__ . '/config/iiko.php';

        $this->publishes([$source => config_path('iiko.php')]);

        $this->mergeConfigFrom($source, 'iiko');
    }
}
