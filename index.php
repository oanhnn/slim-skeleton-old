<?php
// define a working directory
defined('APP_PATH') || define('APP_PATH', dirname(__FILE__) . '/app'); // PHP v5.3+
// define application environment
defined('APP_PATH') || define('APP_ENV', getenv('APP_ENV') ? getenv('APP_ENV') : 'production');

require_once APP_PATH . '/../public/index.php';