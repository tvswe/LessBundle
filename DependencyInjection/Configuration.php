<?php declare(strict_types=1);

namespace Tvswe\LessBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('tvswe_less');
        $rootNode = $treeBuilder->getRootNode();

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
