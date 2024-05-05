<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Generator;

interface PlaceHolderGeneratorInterface
{
    /**
     * Generates a placeholder for a Sulu media with the specified format and given options.
     *
     * @param string $suluMediaFormat The format of the Sulu media for which to generate the placeholder.
     * @param array  $options         Additional options for generating the placeholder (optional).
     *
     * @return string The generated placeholder.
     */
    public function generate(string $suluMediaFormat, array $options = []): string;
}