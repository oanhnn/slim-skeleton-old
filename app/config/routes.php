<?php
/*@var $app \Slim\App */
$app->add(new \Slim\HttpCache\Cache('public', 86400));
//$app->add(new \Slim\Csrf\Guard);

$app->get('/', 'App\Http\Controllers\Pages:index')->setName('homepage');