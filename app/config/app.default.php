<?php

/*
 * This file is part of `oanhnn/slim-skeleton` project.
 *
 * (c) OanhNN <oanhnn.bk@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

return [
    'settings' => [
        'httpVersion' => '1.1',
        'responseChunkSize' => 4096,
        'outputBuffering' => 'append',
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => false,
        // View settings
        'view' => [
            'template_path' => APP_PATH.'/views',
            'twig' => [
                'cache' => ROOT_PATH.'/tmp/cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],
        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => ROOT_PATH.'/tmp/logs/app.log',
        ],
        'doctrine' => [
            'meta' => [
                'entity_path' => [
                    'app/src/Models/Entity'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' => ROOT_PATH . '/tmp/cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'dbname' => 'your-db',
                'user' => 'your-user-name',
                'password' => 'your-password',
            ]
        ],
    ],
];
