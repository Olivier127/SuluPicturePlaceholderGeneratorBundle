<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Generator;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

Interface PlaceHolderGeneratorInterface
{
    public function generate(int $width, int $height, string $format): string;
}