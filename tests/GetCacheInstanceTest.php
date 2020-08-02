<?php

namespace Foris\Easy\Sdk\Cache\Tests;

use Foris\Easy\Cache\Cache;
use Foris\Easy\Sdk\Cache\ServiceProvider;
use Foris\Easy\Sdk\Cache\Tests\Component\NonSdkComponent;
use Foris\Easy\Sdk\Cache\Tests\Component\SdkComponent;

/**
 * Class GetCacheInstanceTest
 */
class GetCacheInstanceTest extends \Foris\Easy\Sdk\Develop\TestCase
{
    /**
     * Set up test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->app()->registerProviders([ServiceProvider::class]);
    }

    /**
     * Test get http-client instance.
     */
    public function testGetHttpClientInstance()
    {
        $this->assertInstanceOf(Cache::class, $this->app()->get('cache'));
    }

    /**
     * Test get cache configuration.
     */
    public function testGetHttpClientConfiguration()
    {
        $config = require __DIR__ . '/../src/config/cache.php';
        $this->assertEquals($config, $this->app()->get('config')->get('cache'));
    }

    /**
     * Test get http-client form 'HasCache' trait
     *
     * @throws \Foris\Easy\Cache\InvalidConfigException
     * @throws \Foris\Easy\Cache\RuntimeException
     */
    public function testGetHttpClientInstanceFromTrait()
    {
        $component = new NonSdkComponent();
        $this->assertInstanceOf(Cache::class, $component->cache());

        $this->app()->bind(SdkComponent::name(), function ($app) {
            return new SdkComponent($app);
        });
        $this->assertInstanceOf(Cache::class, $this->app()->get(SdkComponent::name())->cache());
    }
}
