<?php
/**
 * Config router of app
 * <code>
 * 'name' => [$path, $callable, $methods]
 * 'name' => [$path, $middleware, $callable, $methods]
 * 'name' => [$path, $middleware1, $middleware2, $callable, $methods]
 * </code>
 * vars:
 * $path        string 
 * $middleware  string|Closure
 * $callable    string|Closure
 * $methods     string|array
 */
return [
    'home' => ['/', 'App\\Controller\\Pages:indexAction', 'GET'],
    'pages' => ['/:page', 'App\\Controller\\Pages:indexAction', 'GET'],
];
