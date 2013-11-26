<?php
// define a working directory
define('APP_PATH', dirname(__DIR__)); // PHP v5.3+
// define application environment
define('APP_ENV', getenv('APP_ENV') ? getenv('APP_ENV') : 'production');

require APP_PATH . '/vendor/autoload.php';

$config = require_once APP_PATH . '/app/config/config.php';
//$router = require_once APP_PATH . '/app/config/router.php';
//$db     = require_once APP_PATH . '/app/config/db.php';

// Prepare app
$app = new \Slim\Slim($config);

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler(APP_PATH . '/app/logs/app.log', 
            \Psr\Log\LogLevel::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath(APP_PATH . '/app/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// Define routes
$app->get('/', function () use ($app) {
    // Sample log message
    $app->log->info("Slim-Skeleton '/' route");
    // Render index view
    $app->render('index.html');
});

// Run app
$app->run();
