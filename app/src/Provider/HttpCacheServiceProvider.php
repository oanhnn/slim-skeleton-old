<?php

/*
 * This file is part of `oanhnn/slim-skeleton` project.
 *
 * (c) OanhNN <oanhnn.bk@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\HttpCache\CacheProvider;

/**
 * Http cache service provider
 *
 * <code>
 * $ composer require slim/http-cache ^ 0.3.0
 * </code>
 */
class HttpCacheServiceProvider implements ServiceProviderInterface
{
    /**
     * Register Http Cache Service Provider.
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
