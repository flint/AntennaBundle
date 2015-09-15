<?php

namespace Flint\Bundle\AntennaBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AntennaExtension extends \Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension
{
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $container->setParameter('antenna.shared_secret', $mergedConfig['secret']);
        $container->setParameter('antenna.time_to_live', $mergedConfig['time_to_live']);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
