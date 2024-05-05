<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Generator;

Interface PlaceHolderGeneratorInterface
{
    public function generate(string $suluMediaFormat, array $options = []): string;
}