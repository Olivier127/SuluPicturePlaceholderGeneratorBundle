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
            new TwigFunction('sulu_generate_placeholder', [$this, 'generatePlaceHolder']),
            new TwigFunction('sulu_generate_picture', [$this, 'generatePicture']),
        ];
    }

    public function generatePlaceHolder(string $format, array $options = []) : string
    {
        return $this->placeHolderRegister->getPlaceHolderGenerator()->generate($format, $options);
    }

    public function generatPicture(string $format, array $options = []) : string
    {
        return $this->placeHolderRegister->getPictureGenerator()->generate($format, $options);
    }
}
