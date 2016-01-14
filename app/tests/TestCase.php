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

use Slim\Http\Environment;
use Slim\Http\Uri;
use Slim\Http\Body;
use Slim\Http\Headers;
use Slim\Http\Request;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Slim\App
     */
    protected $app;

    /**
     * @return \Slim\App
     */
    protected function appFactory()
    {
        if (null === $this->app) {
            $this->app = require_once APP_PATH . '/config/bootstrap.php';
        }

        return $this->app;
    }

    /**
     * Call the given URI and return the Response.
     *
     * @param string $method        Request method. Eg: GET, POST, PUT, DELETE, ...
     * @param string $path          Path MUST be formatted as /.*
     * @param array  $queries       Query parameters
     * @param array  $cookies       Cookie parameters
     * @param array  $servers       Server parameters
     * @param string $content       POST content
     * @return \Slim\Http\Response
     */
    protected function call($method, $path, $queries = [], $cookies = [], $servers = [], $content = null)
    {
        if (!preg_match('/^\\/.*/', $path)) {
            throw new \InvalidArgumentException('Parameter $path MUST be formatted as /.*');
        }

        $method = strtoupper($method);

        // Prepare request and response objects
        $env = Environment::mock([
                'SCRIPT_NAME'    => '/index.php',
                'REQUEST_URI'    => $path,
                'REQUEST_METHOD' => $method,
        ]);
        $uri = Uri::createFromEnvironment($env)->withQuery(http_build_query($queries));

        $headers = Headers::createFromEnvironment($env);
        $servers = array_merge($env->all(), $servers);

        $body = new Body(fopen('php://temp', 'r+'));
        if ('POST' === $method) {
            $body->write($content);
        }

        $request = new Request($method, $uri, $headers, $cookies, $servers, $body);

        $app = $this->appFactory();
        $app->getContainer()['request'] = $request;

        return $app->run(true);
    }
}
