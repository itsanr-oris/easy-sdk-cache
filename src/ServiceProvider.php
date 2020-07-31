<?php

namespace Foris\Easy\Sdk\Cache;

use Foris\Easy\Cache\Cache;
use Foris\Easy\Cache\Factory;

/**
 * Class ServiceProvider
 */
class ServiceProvider extends \Foris\Easy\Sdk\ServiceProvider
{
    /**
     * Register component to application.
     *
     * @throws \ReflectionException
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/cache.php', 'cache');

        $this->publishes([
            __DIR__ . '/config/cache.php' => $this->app()->getConfigPath('cache.php')
        ]);

        $this->app()->singleton('cache_adapter_factory', function () {
            return new Factory();
        });

        $this->app()->singleton('cache', function ($app) {
            return new Cache($app['cache_adapter_factory'], $app->config['cache']);
        });
    }
}
