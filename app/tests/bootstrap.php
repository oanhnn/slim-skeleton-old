<?php

// Set timezone
date_default_timezone_set('UTC');

// define a working directory
defined('APP_PATH') || define('APP_PATH', dirname(__DIR__));
defined('ROOT_PATH') || define('ROOT_PATH', dirname(APP_PATH));

/*@var $autoloader \Composer\Autoload\ClassLoader */
$autoloader = require ROOT_PATH . '/vendor/autoload.php';

// Register test classes
$autoloader->addPsr4('App\\Tests\\', __DIR__);