<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Register;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Olivier127\PlaceHolderGenerator\Generator\PlaceHolderGeneratorInterface;

class PlaceHolderRegister implements PlaceHolderRegisterInterface
{
    /**
     * @var PlaceHolderGeneratorInterface[]
     */
    private $generators;

    public function addPlaceHolderGenerator(PlaceHolderGeneratorInterface $generator, string $alias): void
    {
        $this->generators[$alias] = $generator;
    }

    public function getPictureGenerator(): PlaceHolderGeneratorInterface
    {
        return $this->generators['picture_generator'];
    }

    public function getPlaceHolderGenerator(): PlaceHolderGeneratorInterface
    {
        return $this->generators['placeholder_generator'];
    }
}