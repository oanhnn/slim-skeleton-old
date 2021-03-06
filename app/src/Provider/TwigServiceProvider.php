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
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

class TwigServiceProvider implements ServiceProviderInterface
{
    /**
     * Register Twig Service Provider.
     *
     * @param Container $container
     */
    public function register(Container $container)
    {
        $config = $this->getConfig($container->get('settings'));

        $container['view'] = function (Container $container) use ($config) {
            $engine = new Twig($config['template_path'], $config['twig']);
            // Add extensions
            $engine->addExtension(new TwigExtension($container->get('router'), $container->get('request')->getUri()));
            $engine->addExtension(new \Twig_Extension_Debug());

            return $engine;
        };
    }

    /**
     * Get settings for view engine.
     *
     * @param \Slim\Collection $settings
     *
     * @return array
     */
    private function getConfig($settings)
    {
        $key = 'view';
        $defaults = [
            'template_path' => APP_PATH.'/views',
            'twig' => [
                'cache' => ROOT_PATH.'/tmp/cache/twig',
                'debug' => false,
                'auto_reload' => true,
            ],
        ];

        return array_merge($defaults, $settings->get($key, []));
    }
}
