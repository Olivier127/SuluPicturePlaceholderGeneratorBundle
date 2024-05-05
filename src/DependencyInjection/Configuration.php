<?php

declare(strict_types=1);

namespace Olivier127\PlaceHolderGenerator\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('olivier127_place_holder_generator');

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('lorempicsum')
                    ->children()
                        ->scalarNode('seed')
                            ->defaultNull()
                        ->end()
                        ->integerNode("id")
                            ->defaultNull()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('placehold')
                    ->children()
                        ->scalarNode('text')
                            ->defaultNull()
                        ->end()
                        ->enumNode('text_font')
                            ->defaultNull()
                            ->values(['lato', 'montserrat', 'oswald', 'pt-sans', 'roboto', 'lora', 'open-sans', 'playfair-display', 'raleway', 'source-sans-pro', 'oswald'])
                        ->end()
                        ->scalarNode('background_color')
                            ->defaultNull()
                        ->end()
                        ->scalarNode('text_color')
                            ->defaultNull()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}