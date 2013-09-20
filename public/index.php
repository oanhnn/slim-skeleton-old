<?php
/**
 * 
 */
// define a working directory
define('APP_PATH', dirname(__DIR__)); // PHP v5.3+
// define application environment
define('APP_ENV', getenv('APP_ENV') ? getenv('APP_ENV') : 'production');

// load
require_once APP_PATH . '/vendor/autoload.php';

$config = require_once APP_PATH . '/app/config/config.php';
$router = require_once APP_PATH . '/app/config/router.php';
$db     = require_once APP_PATH . '/app/config/db.php';

$app = new \SlimController\Slim($config);
$con = new \PDO($db['dsn'], $db['username'], $db['password'], $db['options']);

$app->db = new \NotORM($con);
$app->addRoutes($router);
$app->run();
