<?php

/**
 * 
 */
return array(
    // Application
    'mode' => APP_ENV,
    // Debugging
    'debug' => APP_ENV === 'development',
    // Logging
    //'log.writer' => null,
    //'log.level' => \Slim\Log::DEBUG,
    //'log.enabled' => true,
    // View
    'templates.path' => realpath(APP_PATH . '/app/templates'),
    //'view' => '\Slim\View',
    // Cookies
    'cookies.encrypt' => false,
    'cookies.lifetime' => '20 minutes',
    'cookies.path' => '/',
    'cookies.domain' => null,
    'cookies.secure' => false,
    'cookies.httponly' => false,
    // Encryption
    'cookies.secret_key' => 'CHANGE_ME',
    'cookies.cipher' => MCRYPT_RIJNDAEL_256,
    'cookies.cipher_mode' => MCRYPT_MODE_CBC,
    // HTTP
    'http.version' => '1.1',
    // Controller
    'controller.class_prefix'    => '',
    'controller.method_suffix'   => 'Action',
    'controller.template_suffix' => 'php',
);
