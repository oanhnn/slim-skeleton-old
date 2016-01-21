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

use Slim\Http\Body;
use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\Uri;

abstract class IntegrationTestCase extends TestCase
{

    /**
     * Call the given URI and return the Response.
     *
     * @param string $method        Request method. Eg: GET, POST, PUT, DELETE, ...
     * @param string $path          Request path. Eg: /api/user
     * @param array  $queries       Query parameters
     * @param array  $cookies       Cookie parameters
     * @param array  $servers       Server parameters
     * @param string $content       POST content
     * @return \Slim\Http\Response
     */
    protected function call($method, $path, $queries = [], $cookies = [], $servers = [], $content = null)
    {
        $method = strtoupper($method);

        // Prepare request and response objects
        $env = Environment::mock([
                    'SCRIPT_NAME' => '/index.php',
                    'REQUEST_URI' => $path,
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

        $this->app->getContainer()['request'] = $request;

        return $this->app->run(true);
    }

}