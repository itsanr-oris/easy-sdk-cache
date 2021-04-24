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

        $this->app()->singleton(Factory::class, function () {
            return new Factory();
        });

        $this->app()->singleton(Cache::class, function ($app) {
            return new Cache($app[Factory::class], $app->config['cache']);
        });
    }
}
