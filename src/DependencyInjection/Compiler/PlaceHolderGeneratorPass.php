<?php

namespace Olivier127\PlaceHolderGenerator\DependencyInjection\Compiler;

use Olivier127\PlaceHolderGenerator\Register\PlaceHolderRegister;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class PlaceHolderGeneratorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has(PlaceHolderRegister::class)) {
            return;
        }

        $definition = $container->findDefinition(PlaceHolderRegister::class);

        $taggedServices = $container->findTaggedServiceIds('sulu.picture_placeholder_generator');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addPlaceHolderGenerator', [new Reference($id)]);
        }
    }
}