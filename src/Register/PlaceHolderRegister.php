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

    public function __construct(
        #[Autowire(param: 'sulu_media.image.formats')] private array $formats,
        #[Autowire(param: 'placeholder_generator.mode')] private string $mode
    ) {

    }

    public function addPlaceHolderGenerator(PlaceHolderGeneratorInterface $generator, string $alias): void
    {
        $this->generators[$alias] = $generator;
    }

    public function generate(string $suluImageformat): string
    {
        $suluFormat = explode(".", $suluImageformat);
        $imageFormatKey = $suluFormat[0];
        $extension = $suluFormat[1] ?? "webp";

        $format = $this->formats[$imageFormatKey];
        $with = $format["scale"]['x'] ?? $format["scale"]['y'];
        $height = $format["scale"]['y'] ?? $format["scale"]['x'];

        if ($this->mode != "random") {
            return $this->generators[$this->mode]->generate($with, $height, $extension);
        }
        return $this->generators[array_rand($this->generators)]->generate($with, $height, $extension);
    }
}