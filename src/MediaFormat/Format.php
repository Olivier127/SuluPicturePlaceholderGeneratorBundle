<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\MediaFormat;

class Format
{
    public function __construct(
        public readonly int $width,
        public readonly int $height,
        public readonly string $extension,
    ) {

    }
}