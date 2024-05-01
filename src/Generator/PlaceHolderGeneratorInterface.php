<?php

namespace Olivier127\PlaceHolderGenerator\Generator;

use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

declare(strict_types=1);

#[AutoconfigureTag('sulu.picture_placeholder_generator')]
Interface PlaceHolderGeneratorInterface
{
    public function generate(int $with, int $height, string $format = "webp"): string;
}