<?php

declare(strict_types=1);

namespace Olivier127\Sulu\PicturePlaceHolderGenerator\Generator;

class PlaceHold implements PlaceHolderGeneratorInterface
{
    public function generate(int $with, int $height, string $format = "webp"): string
    {
        return sprintf("https://placehold.co/%dx%d.%s", $with, $height, $format);
    }
}