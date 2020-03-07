<?php declare(strict_types=1);

namespace Tvswe\LessBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Tvswe\LessBundle\Command\CompileLessCommand;

class TvsweLessExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(dirname(__DIR__).'/Resources/config'));
        $loader->load('services.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $def = $container->getDefinition(CompileLessCommand::class);
        $def->addArgument( $config['less']['path'] . DIRECTORY_SEPARATOR . $config['less']['file']);
        $def->addArgument($config['css']['path'] . DIRECTORY_SEPARATOR . $config['css']['file']);
    }
}