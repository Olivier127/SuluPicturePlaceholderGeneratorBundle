<?php

namespace Olivier127\PlaceHolderGenerator\Twig;

use Olivier127\PlaceHolderGenerator\Register\PlaceHolderRegister;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Symfony\Component\DependencyInjection\Attribute\AsTaggedItem;

#[AsTaggedItem('twig.extension')]
class PlaceHolderGeneratorTwigExtension extends AbstractExtension
{
    public function __construct(private PlaceHolderRegister $placeHolderRegister)
    {
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('sulu_picture_placeholder', [$this, 'generatePlaceHolder']),
        ];
    }

    public function generatePlaceHolder(string $format) : string
    {
        return $this->placeHolderRegister->generate($format);
    }
}
