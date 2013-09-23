<?php
/**
 * Config router of app
 * <code>
 * '/some/path' => 'className:methodName',
 * '/some/path' => array('className:methodName', 'get'),
 * '/some/path' => array('className:methodName', 'get', function(){}),
 * </code>
 */
return array(
    '/' => array('Demo\\Frontend\\Controller\\Index:index', 'GET')
);