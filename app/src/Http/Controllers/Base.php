<?php

/*
 * This file is part of `oanhnn/slim-skeleton` project.
 *
 * (c) OanhNN <oanhnn.bk@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Http\Controllers;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

abstract class Base
{
    /**
     * @var \Interop\Container\ContainerInterface
     */
    protected $container;

    /**
     * Controller Contructor.
     *
     * @param \Interop\Container\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Render a view.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param string                              $view
     * @param array                               $data
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function render(ResponseInterface $response, $view, $data = [])
    {
        /*@var $engine \Slim\Views\Twig */
        $engine = $this->container->get('view');

        return $engine->render($response, $view.'.twig', $data);
    }
}
