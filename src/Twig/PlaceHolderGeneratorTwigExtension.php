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


    /**
     * Generates a placeholder using the registered placeholder generator.
     *
     * @param   string  $format     The format of the placeholder.
     * @param   array   $options    Additional options for generating the placeholder (optional).
     *
     * @return  string  The generated placeholder.
     */
    public function generatePlaceHolder(string $format, array $options = []): string
    {
        return $this->placeHolderRegister->getPlaceHolderGenerator()->generate($format, $options);
    }

    /**
     * Generates a picture using the registered picture generator.
     *
     * @param   string  $format     The format of the picture.
     * @param   array   $options    Additional options for generating the picture (optional).
     *
     * @return  string  The generated picture.
     */
    public function generatePicture(string $format, array $options = []): string
    {
        return $this->placeHolderRegister->getPictureGenerator()->generate($format, $options);
    }
}
