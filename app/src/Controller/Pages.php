<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Psr\Log\LoggerInterface;

class Pages
{

    /**
     * @var \Slim\Views\Twig;
     */
    private $view;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * Construct
     *
     * @param Twig $view
     * @param LoggerInterface $logger
     */
//    public function __construct(Twig $view, LoggerInterface $logger)
//    {
//        $this->view   = $view;
//        $this->logger = $logger;
//    }

    /**
     * Index action
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function indexAction(Request $request, Response $response, $args)
    {
        $response->write('Hello world!');
    }

}