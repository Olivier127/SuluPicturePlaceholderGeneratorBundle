<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Generator;

use Olivier127\PlaceHolderGenerator\MediaFormat\Converter;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('sulu.picture_placeholder_generator', ['alias' => 'placeholder_generator'])]
class PlaceHold implements PlaceHolderGeneratorInterface
{
    public function __construct(
        private Converter $converter,
        #[Autowire(param: 'placeholder.placehold')] private array $config = []
    ) {
    }

    public function generate(string $suluMediaFormat, array $options = []): string
    {
        $format = $this->converter->get($suluMediaFormat);

        $url = sprintf("https://placehold.co/%dx%d", $format->width, $format->height);

        $config = array_merge($options, $this->config);

        if (array_key_exists('background_color', $this->config) && !is_null($this->config['background_color'])
            && array_key_exists('text_color', $this->config) && !is_null($this->config['text_color'])
        ) {
            $url .= sprintf("%s/%s", $this->config['background_color'], $this->config['text_color']);
        }

        $url .= ".{$format->extension}";

        $getParameters = [];

        $text = $config['text'] ?? '';
        if (!empty($text)) {
            $getParameters['text'] = $text;
        }

        $font = $config['text_font'] ?? '';
        if (!empty($font)) {
            $getParameters['font'] = $font;
        }

        if (!empty($getParameters)) {
            $url .= "?".http_build_query($getParameters);
        }

        return $url;
    }
}