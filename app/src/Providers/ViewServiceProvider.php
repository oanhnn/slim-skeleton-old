<?php

/*
 * This file is part of `oanhnn/slim-skeleton` project.
 *
 * (c) OanhNN <oanhnn.bk@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\Views\PhpRenderer;

class ViewServiceProvider implements ServiceProviderInterface
{
    /**
     * Register PHP view service provider.
     *
     * @param Container $container
     */
    public function register(Container $container)
    {
        $config = $this->getConfig($container->get('settings'));

        $container['view'] = function () use ($config) {
            $engine = new PhpRenderer($config['template_path']);

            return $engine;
        };
    }

    /**
     * @param \Slim\Collection $settings
     *
     * @return array
     */
    private function getConfig($settings)
    {
        $key = 'view';
        $defaults = [
            'template_path' => APP_PATH.'/views',
        ];

        return array_merge($defaults, $settings->get($key, []));
    }
}
