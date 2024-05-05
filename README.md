# Sulu Picture Placeholder Generator Bundle

This bundle provides functionality for generating picture placeholders for Sulu CMS.

## Installation

You can install this bundle via Composer:

```bash
composer require olivier127/sulu-picture-placeholder-generator-bundle
```

## Configuration

After installing the bundle, you can configure it in your Symfony application. Add the following configuration to your `config/packages/olivier127_place_holder_generator.yaml` file to put the defaut values :

```yaml
olivier127_place_holder_generator:
  lorempicsum:
    seed: <a string>
    id: <a integer>
  placehold:
    text: <60 characters max>
    text_font: <inside ['lato', 'montserrat', 'oswald', 'pt-sans', 'roboto', 'lora', 'open-sans', 'playfair-display', 'raleway', 'source-sans-pro', 'oswald']>
    background_color: <css code color or hexa like FFFFFF>
    text_color: <css code color or hexa like FFFFFF>
```

You can not specify seed and id at the same time for lorem picsum.
You can only specify the require parameters.
```yaml
olivier127_place_holder_generator:
  placehold:
    background_color: orange
```

see : https://placehold.co/
and : https://picsum.photos/


## Twig Extensions

This bundle provides two Twig extensions: `sulu_generate_placeholder` and `sulu_generate_picture`.

### Usage

#### `sulu_generate_placeholder`

This Twig function generates a placeholder using the configured placeholder generator. The options override the bundle configuration.

```twig
{% set placeholder = sulu_generate_placeholder('thumbnail') %}
<img src="{{ placeholder }}" alt="Placeholder Image">

{% set placeholder = sulu_generate_placeholder('thumbnail', { 'text': 'Sulu CMS', 'text_font': 'lato' }) %}
<img src="{{ placeholder }}" alt="Placeholder Image">

{% set placeholder = sulu_generate_placeholder('thumbnail', { 'background_color': 'ccc', 'text_color': '000' }) %}
<img src="{{ placeholder }}" alt="Placeholder Image">
```

The `options` argument uses the same configuration as `placehold`.

#### `sulu_generate_picture`

This Twig function generates a picture using the configured picture generator. The options override the bundle configuration.

```twig
{% set picture = sulu_generate_picture('thumbnail') %}
<img src="{{ picture }}" alt="Generated Picture">

{% set picture = sulu_generate_picture('thumbnail', { 'seed': '123456' }) %}
<img src="{{ picture }}" alt="Generated Picture">

{% set picture = sulu_generate_picture('thumbnail', { 'id': 100 }) %}
<img src="{{ picture }}" alt="Generated Picture">
```

The `options` argument uses the same configuration as `lorempicsum`.

