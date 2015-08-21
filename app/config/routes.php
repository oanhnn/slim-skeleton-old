<?php
/*@var $app \Slim\App */

$app->get('/', 'App\Controller\Pages:indexAction')->setName('homepage');