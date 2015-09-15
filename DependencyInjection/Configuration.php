<?php

namespace Flint\Bundle\AntennaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('antenna');

        $rootNode
            ->children()
                ->scalarNode('secret')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('time_to_live')
                    ->defaultValue('7 days')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
