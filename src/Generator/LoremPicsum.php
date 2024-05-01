<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Generator;

class LoremPicsum implements PlaceHolderGeneratorInterface
{
    public function generate(int $with, int $height, string $format = "webp"): string
    {
        return sprintf("https://picsum.photos/%d/%d.%d?random=%s", $with, $height, $format, uniqid());
    }
}