<?php

namespace Olivier127\PlaceHolderGenerator\Twig;

use Olivier127\PlaceHolderGenerator\Register\PlaceHolderRegister;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PlaceHolderGeneratorTwigExtension extends AbstractExtension
{
    public function __construct(
        private PlaceHolderRegister $placeHolderRegister
    ) {

    }

    public function getFunctions()
    {
        return [
            new TwigFunction('sulu_picture_placeholder', [$this, 'generatePlaceHolder']),
        ];
    }

    public function geneneratePlaceHolder(string $format) : string
    {
        [$imageFormat, $extension] = explode('.', $format, 2);

        return $this->placeHolderRegister->generate($format);
    }
}
