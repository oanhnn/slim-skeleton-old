<?php

return [
    'App' => [
        // Application
        'mode'                => APP_ENV,
        // Debugging
        'debug'               => APP_ENV === 'development',
        // Logging
        //'log.writer' => null,
        //'log.level' => \Slim\Log::DEBUG,
        //'log.enabled' => true,
        // View
        'templates.path'      => realpath(APP_PATH . '/templates'),
        //'view' => '\Slim\View',
        // Cookies
        'cookies.encrypt'     => false,
        'cookies.lifetime'    => '20 minutes',
        'cookies.path'        => '/',
        'cookies.domain'      => null,
        'cookies.secure'      => false,
        'cookies.httponly'    => false,
        // Encryption
        'cookies.secret_key'  => 'CHANGE_ME',
        'cookies.cipher'      => MCRYPT_RIJNDAEL_256,
        'cookies.cipher_mode' => MCRYPT_MODE_CBC,
        // HTTP
        'http.version'        => '1.1',
    ],
    'DB'  => [
        'dsn'      => 'mysql:host=127.0.0.1;post=3306;dbname=test;charset=utf8',
        'username' => 'root',
        'password' => '',
        'options'  => []
    ]
];
