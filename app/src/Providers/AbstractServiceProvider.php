<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

abstract class AbstractServiceProvider implements ServiceProviderInterface
{

    protected $defaults = [];
    protected $key = 'abstract_service';

    /**
     *
     * @param \Slim\Collection $settings
     */
    protected function getConfig($settings)
    {
        return array_merge($this->defaults, $settings->get($this->key, []));
    }

    abstract public function register(Container $container);
}