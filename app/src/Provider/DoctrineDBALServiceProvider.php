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

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Doctrine DBAL service provider
 *
 * <code>
 * $ composer require doctrine/dbal ^2.5
 * </code>
 */
class DoctrineDBALServiceProvider implements ServiceProviderInterface
{

    /**
     * Register log service provider.
     *
     * @param Container $container
     */
    public function register(Container $container)
    {
        $doctrine = $this->getConfig($container->get('settings'));
        $config = new Configuration();
        $params = $doctrine['connection'];

        $container['doctrine.dbal'] = DriverManager::getConnection($params, $config);
    }

    /**
     * Get config for logger.
     *
     * @param \Slim\Collection $settings
     * @return array
     */
    private function getConfig($settings)
    {
        $key = 'doctrine';
        $defaults = [
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'dbname' => 'your-db',
                'user' => 'your-user-name',
                'password' => 'your-password',
            ],
        ];

        return array_merge($defaults, $settings->get($key, []));
    }

}
