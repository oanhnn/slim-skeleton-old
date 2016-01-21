<?php

/*
 * This file is part of `oanhnn/slim-skeleton` project.
 *
 * (c) OanhNN <oanhnn.bk@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Tests;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Slim\App
     */
    protected $app;

    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $con;

    /**
     * Setting up
     */
    protected function setUp()
    {
        if (null === $this->app) {
            $this->app = require_once APP_PATH . '/config/bootstrap.php';
        }

        $this->con = $this->app->getContainer()->get('doctrine.dbal');

        parent::setUp();
    }

    /**
     * Tear down
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Load fixtures
     *
     * @param array $tables
     */
    protected function loadFixtures($tables = [])
    {
        foreach ($tables as $table) {
            $filePath = APP_PATH . '/tests/fixtures/' . $table . '.sql';

            if (!file_exists($filePath)) {
                throw new \InvalidArgumentException(sprintf("SQL file '<info>%s</info>' does not exist.", $filePath));
            } elseif (!is_readable($filePath)) {
                throw new \InvalidArgumentException(sprintf("SQL file '<info>%s</info>' does not have read permissions.", $filePath));
            }

            $sql = file_get_contents($filePath);

            $this->con->exec('TRUNCATE ' . $table);
            $this->con->exec($sql);
        }
    }

}
