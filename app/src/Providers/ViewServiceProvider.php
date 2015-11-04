<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\Views\PhpRenderer;

class ViewServiceProvider implements ServiceProviderInterface
{

    /**
     * Register PHP view service provider
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
     *
     * @param array $settings
     * @return array
     */
    private function getConfig($settings)
    {
        $key = 'view';
        $defaults = [
            'template_path' => APP_PATH . '/views',
        ];
        $config = isset($settings[$key]) ? $settings[$key] : [];

        return array_merge_recursive($defaults, $config);
    }

}