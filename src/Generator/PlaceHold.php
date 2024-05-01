<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Generator;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('sulu.picture_placeholder_generator', ['alias' => 'placehold'])]
class PlaceHold implements PlaceHolderGeneratorInterface
{
    public function __construct(#[Autowire(param: 'placeholder.placehold')] private array $config = [])
    {
    }

    public function generate(int $width, int $height, string $format): string
    {
        $url = sprintf("https://placehold.co/%dx%d", $width, $height);

        if (array_key_exists('color', $this->config)
            && array_key_exists('background_color', $this->config['color']) && !is_null($this->config['color']['background_color'])
            && array_key_exists('text_color', $this->config['color']) && !is_null($this->config['color']['text_color'])
        ) {
            $url .= sprintf("%s/%s", $this->config['color']['background_color'], $this->config['color']['text_color']);
        }

        $url .= ".{$format}";

        $getParameters = [];
        if (array_key_exists('text', $this->config) && !is_null($this->config['text'])) {
            $getParameters['text'] = $this->config['text'];
        }
        if (array_key_exists('text_font', $this->config) && !is_null($this->config['text_font'])) {
            $getParameters['font'] = $this->config['text_font'];
        }
        if (!empty($getParameters)) {
            $url .= "?".http_build_query($getParameters);
        }

        return $url;
    }
}