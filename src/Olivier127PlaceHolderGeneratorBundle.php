<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator;

use Olivier127\PlaceHolderGenerator\DependencyInjection\Compiler\PlaceHolderGeneratorPass;
use Olivier127\PlaceHolderGenerator\DependencyInjection\Olivier127PlaceHolderGeneratorExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class Olivier127PlaceHolderGeneratorBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new PlaceHolderGeneratorPass());
        parent::build($container);
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return new Olivier127PlaceHolderGeneratorExtension();
    }
}