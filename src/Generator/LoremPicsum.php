<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Generator;

use Olivier127\PlaceHolderGenerator\MediaFormat\Converter;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('sulu.picture_placeholder_generator', ['alias' => 'picture_generator'])]
class LoremPicsum implements PlaceHolderGeneratorInterface
{
    public function __construct(
        private Converter $converter,
        #[Autowire(param: 'placeholder.lorempicsum')] private array $config = [])
    {
    }

    public function generate(string $suluMediaFormat, array $options = []): string
    {
        $format = $this->converter->get($suluMediaFormat);
        return sprintf(
            "https://picsum.photos/%d/%d.%s?random=%s",
            $format->width,
            $format->height,
            $format->extension,
            uniqid()
        );
    }
}