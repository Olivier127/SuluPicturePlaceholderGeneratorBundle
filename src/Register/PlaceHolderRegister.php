<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Register;

use Olivier127\PlaceHolderGenerator\Generator\PlaceHolderGeneratorInterface;

class PlaceHolderRegister
{
    /**
     * @var PlaceHolderGeneratorInterface[]
     */
    private $generators;

    public function addPlaceHolderGenerator(PlaceHolderGeneratorInterface $generator): void
    {
        $this->generators[] = $generator;
    }

    public function generate(string $suluImageformat): string
    {
        [$imageFormat, $extension] = explode(".", $suluImageformat);

        return $this->generators[0]->generate($with, $height, $extension);
    }
}