<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class Olivier127PlaceHolderGeneratorExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('services.yaml');

        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('placeholder_generator.lorempicsum', $config['lorempicsum'] ?? []);
        $container->setParameter('placeholder_generator.placehold', $config['placehold'] ?? []);
    }

}