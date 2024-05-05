<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\MediaFormat;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

class Converter
{
    public function __construct(#[Autowire(param: 'sulu_media.image.formats')] private array $formats) {}

    public function get(string $suluImageformat): Format
    {
        $suluFormat = explode(".", $suluImageformat);
        $imageFormatKey = $suluFormat[0];
        $extension = $suluFormat[1] ?? "webp";

        $format = $this->formats[$imageFormatKey];
        $width = $format["scale"]['x'] ?? $format["scale"]['y'];
        $height = $format["scale"]['y'] ?? $format["scale"]['x'];

        return new Format($width, $height, $extension);
    }
}