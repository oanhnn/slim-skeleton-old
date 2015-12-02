<?php
// Define a working path
defined('APP_PATH') || define('APP_PATH', dirname(__DIR__));
defined('ROOT_PATH') || define('ROOT_PATH', dirname(APP_PATH));

// Load all class
require_once ROOT_PATH . '/vendor/autoload.php';

// Load application settings
$settings = require_once APP_PATH . '/config/app.php';

// Create container for application
$container = new \Slim\Container($settings);

// Register service providers & factories
$container->register(new \App\Providers\TwigServiceProvider());
$container->register(new \App\Providers\HttpCacheServiceProvider());
$container->register(new \App\Providers\LogServiceProvider());

// Create new application
$app = new \Slim\App($container);

// Register middlewares and routes
require_once APP_PATH . '/config/routes.php';

return $app;