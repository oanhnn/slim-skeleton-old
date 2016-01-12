<?php

/*
 * This file is part of `oanhnn/slim-skeleton` project.
 *
 * (c) OanhNN <oanhnn.bk@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

abstract class AbstractServiceProvider implements ServiceProviderInterface
{
    protected $defaults = [];
    protected $key = 'abstract_service';

    /**
     * @param \Slim\Collection $settings
     */
    protected function getConfig($settings)
    {
        return array_merge($this->defaults, $settings->get($this->key, []));
    }

    abstract public function register(Container $container);
}
