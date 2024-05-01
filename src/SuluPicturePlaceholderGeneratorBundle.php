<?php

declare(strict_types=1);

namespace Olivier127\Sulu\PicturePlaceHolderGenerator;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class SuluPicturePlaceholderGeneratorBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

}