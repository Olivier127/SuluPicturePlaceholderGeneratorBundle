<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Register;

use Olivier127\PlaceHolderGenerator\Generator\PlaceHolderGeneratorInterface;

interface PlaceHolderRegisterInterface
{
    public function addPlaceHolderGenerator(PlaceHolderGeneratorInterface $generator, string $alias): void;

    public function getPlaceHolderGenerator() : PlaceHolderGeneratorInterface;

    public function getPictureGenerator() : PlaceHolderGeneratorInterface;
}