<?php

namespace App\Controller;

class Pages
{

    public function indexAction($page = 'home')
    {
        \Slim\Slim::getInstance()->render('index.html.twig', [
            'page' => $page
        ]);
    }

}
