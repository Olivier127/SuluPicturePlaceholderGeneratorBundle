<?php

declare(strict_types=1);

namespace Olivier127\Sulu\PicturePlaceHolderGenerator;

use Olivier127\Sulu\PicturePlaceHolderGenerator\DependencyInjection\Compiler\PlaceHolderGeneratorPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class SuluPicturePlaceHolderGeneratorBundle extends AbstractBundle
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
}