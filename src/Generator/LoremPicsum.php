<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\Generator;

use Exception;
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
        if (array_key_exists('seed', $options) && array_key_exists('id', $this->config)) {
            unset($this->config['id']);
        }
        if (array_key_exists('id', $options) && array_key_exists('seed', $this->config)) {
            unset($this->config['seed']);
        }
        $config = array_merge($options, $this->config);
        if (array_key_exists('id', $config) && array_key_exists('seed', $config)) {
            throw new Exception('Seed or Id');
        }

        $format = $this->converter->get($suluMediaFormat);

        $url = sprintf(
            "%d/%d.%s?random=%s",
            $format->width,
            $format->height,
            $format->extension,
            uniqid()
        );
        $static = "";
        if (array_key_exists('id', $config)) {
            $static = sprintf("id/%d/", $config['id']);
        }
        if (array_key_exists('seed', $config)) {
            $static = sprintf("seed/%s/", $config['seed']);
        }

        return "https://picsum.photos/".$static.$url;
    }
}