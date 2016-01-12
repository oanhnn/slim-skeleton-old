<?php

/*
 * This file is part of `oanhnn/slim-skeleton` project.
 *
 * (c) OanhNN <oanhnn.bk@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

$app->add(new \Slim\HttpCache\Cache('public', 86400));
//$app->add(new \Slim\Csrf\Guard);

$app->get('/', 'App\Controller\Pages:index')->setName('homepage');
$app->get('/orders', 'App\Controller\Pages:listOrders')->setName('orderspage');
