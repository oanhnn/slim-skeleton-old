<?php

/*
 * This file is part of `oanhnn/slim-skeleton` project.
 *
 * (c) OanhNN <oanhnn.bk@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

class Pages extends Base
{

    /**
     * Index action.
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return Response
     */
    public function index(Request $request, Response $response, $args)
    {
        $this->render($response, 'welcome.html');
    }

    /**
     * List orders action.
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return Response
     */
    public function listOrders(Request $request, Response $response, $args)
    {
        /* @var $con \Doctrine\DBAL\Connection */
        $con = $this->container->get('doctrine.dbal');
        $stmt = $con->query('SELECT * FROM orders');
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Entity\Order');

        $rows = $stmt->fetchAll();
        
        $this->render($response, 'list_orders.html', ['orders' => $rows]);
    }

}
