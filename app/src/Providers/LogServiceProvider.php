<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Monolog\Handler\StreamHandler;

class LogServiceProvider implements ServiceProviderInterface
{

    /**
     * Register log service provider
     *
     * @param Container $container
     */
    public function register(Container $container)
    {
        $config = $this->getConfig($container->get('settings'));

        $container['logger'] = function () use ($config) {
            $logger = new Logger($config['name']);
            $logger->pushProcessor(new UidProcessor());
            $logger->pushHandler(new StreamHandler($config['path'], Logger::DEBUG));
            return $logger;
        };
    }

    /**
     * Get config for logger
     *
     * @param \Slim\Collection $settings
     * @return array
     */
    private function getConfig($settings)
    {
        $key = 'logger';
        $defaults = [];

        return array_merge($defaults, $settings->get($key, []));
    }

}