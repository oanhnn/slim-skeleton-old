<?php

namespace Api\Controller;

class Test extends \SlimController\SlimController
{
    public function indexAction() {
     var_dump($this->app->db);
        echo 'hello world'; //die();
    }
}
