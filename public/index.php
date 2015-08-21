<?php
/**
 * Config PHP5.4+ built-in web server.
 */
if (php_sapi_name() === 'cli-server') {
    $_SERVER['PHP_SELF'] = '/' . basename(__FILE__);

    $url  = parse_url(urldecode($_SERVER['REQUEST_URI']));
    $file = __DIR__ . $url['path'];
    if (strpos($url['path'], '..') === false && strpos($url['path'], '.') !== false && is_file($file)) {
        return false;
    }
}

/**
 * Defines constants
 */
//define('ROOT_PATH', dirname(__DIR__));
//define('APP_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'app');

error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Run application
 * @var \Slim\App $app
 */
/*@var $app \Slim\App */
$app = require_once __DIR__ . '/../app/config/bootstrap.php';
$app->run();