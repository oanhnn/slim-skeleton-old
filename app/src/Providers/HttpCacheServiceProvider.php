<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\HttpCache\CacheProvider;

class HttpCacheServiceProvider implements ServiceProviderInterface
{

    /**
     * Register Http Cache Service Provider
     *
     * @param Container $container
     */
    public function register(Container $container)
    {
        $container['cache'] = function () {
            return new CacheProvider();
        };
    }

}