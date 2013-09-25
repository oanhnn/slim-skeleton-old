<?php

namespace Demo\Frontend\Controller;
/**
 * Description of Index
 *
 * @author OanhNN <oanhnn@rikkeisoft.com>
 */
class Index extends \SlimController\SlimController
{
    /**
     * Index action
     * URL: /
     * 
     * @return void
     */
    public function indexAction(){
        $name = $this->param('name', 'get');
        if ($name)
            echo "Hello {$name}!";
        else 
            echo "Hello Slim Framework";
    }
}

