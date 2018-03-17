<?php

namespace Tvswe\LessBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class TvsweLessExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(dirname(__DIR__).'/Resources/config'));
        $loader->load('services.yaml');
                
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $def = $container->getDefinition('tvswe.less_bundle.compile_less_command');
        $def->replaceArgument(0, $config['less']['path'] . DIRECTORY_SEPARATOR . $config['less']['file']);
        $def->replaceArgument(1, $config['css']['path'] . DIRECTORY_SEPARATOR . $config['css']['file']);
    }
}