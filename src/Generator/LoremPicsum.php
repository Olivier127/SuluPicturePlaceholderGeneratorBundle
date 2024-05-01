<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Generator;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('sulu.picture_placeholder_generator', ['alias' => 'lorempicsum'])]
class LoremPicsum implements PlaceHolderGeneratorInterface
{
    public function __construct(#[Autowire(param: 'placeholder.lorempicsum')] private array $config = [])
    {
    }

    public function generate(int $width, int $height, string $format): string
    {
        return sprintf("https://picsum.photos/%d/%d.%s?random=%s", $width, $height, $format, uniqid());
    }
}