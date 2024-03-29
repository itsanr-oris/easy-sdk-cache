<?php

namespace Foris\Easy\Sdk\Cache\Traits;

use Foris\Easy\Cache\Cache;
use Foris\Easy\Cache\Factory;
use Foris\Easy\Sdk\ServiceContainer;

/**
 * Trait HasCache
 */
trait HasCache
{
    /**
     * Get cache instance
     *
     * @return Cache
     * @throws \Foris\Easy\Cache\InvalidConfigException
     * @throws \Foris\Easy\Cache\RuntimeException
     */
    public function cache()
    {
        if (method_exists($this, 'app')) {
            $app = $this->app();
            if (!empty($app) && $app instanceof ServiceContainer && $app->has(Cache::class)) {
                return $app->get(Cache::class);
            }
        }

        return new Cache(
            new Factory(),
            [
                'default' => 'file',
                'drivers' => [
                    'file' => ['path' => sys_get_temp_dir() . '/cache/']
                ]
            ]
        );
    }
}
