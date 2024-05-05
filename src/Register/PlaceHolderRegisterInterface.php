<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Register;

use Olivier127\PlaceHolderGenerator\Generator\PlaceHolderGeneratorInterface;

interface PlaceHolderRegisterInterface
{
    /**
     * Adds a placeholder generator with the specified alias.
     *
     * @param PlaceHolderGeneratorInterface $generator The placeholder generator to add.
     * @param string                        $alias     The alias for the placeholder generator.
     *
     * @return void
     */
    public function addPlaceHolderGenerator(PlaceHolderGeneratorInterface $generator, string $alias): void;

    /**
     * Retrieves the placeholder generator.
     *
     * @return PlaceHolderGeneratorInterface The placeholder generator.
     * @throws \RuntimeException             If the placeholder generator is not found.
     */
    public function getPlaceHolderGenerator(): PlaceHolderGeneratorInterface;

    /**
     * Retrieves the picture generator.
     *
     * @return PlaceHolderGeneratorInterface The picture generator.
     * @throws \RuntimeException             If the picture generator is not found.
     */
    public function getPictureGenerator(): PlaceHolderGeneratorInterface;
}