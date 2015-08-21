<?php

return [
    'settings' => [
        // View settings
        'view'   => [
            'template_path' => APP_PATH . '/views',
            'twig'          => [
                'cache'       => ROOT_PATH . '/tmp/cache/twig',
                'debug'       => true,
                'auto_reload' => true,
            ],
        ],
        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => ROOT_PATH . '/tmp/logs/app.log',
        ],
    ],
];