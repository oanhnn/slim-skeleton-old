<?php

namespace App\Http\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Psr\Log\LoggerInterface;

class Pages extends Base
{
    /**
     * Index action
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function index(Request $request, Response $response, $args)
    {
        $this->render($response, 'welcome.html');
    }

}