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

class ExampleTest extends IntegrationTestCase
{
    /**
     * A basic functional test example.
     */
    public function testBasicExample()
    {
        $res = $this->call('GET', '/');

        $this->assertSame('1.1', $res->getProtocolVersion());
        $this->assertSame(200, $res->getStatusCode());
        $this->assertSame('text/html; charset=UTF-8', $res->getHeaderLine('Content-Type'));
    }
}
