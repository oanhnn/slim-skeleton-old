<?php
// define a working directory
defined('APP_PATH') || define('APP_PATH', dirname(__DIR__));
defined('ROOT_PATH') || define('ROOT_PATH', dirname(APP_PATH));

// load all class
require_once ROOT_PATH . '/vendor/autoload.php';

// load application settings
$settings = require_once APP_PATH . '/config/app.php';

// create container for application
$container = new \Slim\Container(compact('settings'));

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

/**
 * Twig view
 *
 * @param \Interop\Container\ContainerInterface $c
 * @return \Slim\Views\Twig
 */
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view     = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);
    // Add extensions
    $view->addExtension(new \Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new \Twig_Extension_Debug());

    return $view;
};


// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

/**
 * Monolog
 *
 * @param \Interop\Container\ContainerInterface $c
 * @return \Monolog\Logger
 */
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger   = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], \Monolog\Logger::DEBUG));

    return $logger;
};

// create new application
$app = new \Slim\App($container);

// register middlewares and routes
require_once APP_PATH . '/config/routes.php';

return $app;