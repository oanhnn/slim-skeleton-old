<?php

/*
 * This file is part of `oanhnn/slim-skeleton` project.
 *
 * (c) OanhNN <oanhnn.bk@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use Doctrine\DBAL\Tools\Console\ConsoleRunner;

/*@var $app \Slim\App */
$app = require __DIR__ . '/app/config/bootstrap.php';

return ConsoleRunner::createHelperSet($app->getContainer()->get('doctrine.dbal'));
