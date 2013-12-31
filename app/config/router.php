<?php
/**
 * Config router of app
 * <code>
 * 'name' => array($path [, $middleware], $callable [, $methods])
 * </code>
 * vars:
 * $path        string 
 * $middleware  string|Closure
 * $callable    string|Closure
 * $methods     string|array
 */
return array(
    'home' => array('/:page', 'Demo\\Frontend\\Controller\\IndexController:indexAction', 'GET')
);
