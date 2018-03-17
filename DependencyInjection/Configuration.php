<?php

namespace Tvswe\LessBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tvswe_less');

        $rootNode
            ->children()
                ->arrayNode('less')
                    ->children()
                        ->scalarNode('path')->end()
                        ->scalarNode('file')->end()
                    ->end()
                ->end()
                ->arrayNode('css')
                    ->children()
                        ->scalarNode('path')->end()
                        ->scalarNode('file')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
