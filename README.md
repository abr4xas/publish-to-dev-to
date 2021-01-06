# publish-to-dev-to

[![Latest Version on Packagist](https://img.shields.io/packagist/v/abr4xas/publish-to-dev-to.svg?style=flat-square)](https://packagist.org/packages/abr4xas/publish-to-dev-to)
[![Total Downloads](https://img.shields.io/packagist/dt/abr4xas/publish-to-dev-to.svg?style=flat-square)](https://packagist.org/packages/abr4xas/publish-to-dev-to)


This is where your description should go. Try and limit it to a paragraph or two. Consider adding a small example.


## Installation

You can install the package via composer:

```bash
composer require abr4xas/publish-to-dev-to
```

## To create an article you need to pass an array like this:

```php
<?php
require 'vendor/autoload.php';

$articleToPost = [
    'article' => [
        'title' => 'Hello, World! From the dev.to API',
        'body_markdown' => 'This my markdown body text',
        'description' => 'Hello, World! From the dev.to API <3',
        'cover_image' => 'https://i.pinimg.com/originals/97/90/12/979012800b47e3bb871cae4009333e08.jpg',
        'tags' => [
            'hello',
            'world'
        ],
    ],
];

try {

    $devTo = (new \Abr4xas\PublishToDevTo\PublishTo('<YOUR_API_KEY>'))
        ->devToMyArticle($articleToPost);

} catch (\Abr4xas\PublishToDevTo\Exceptions\GenericException $e) {
    //
} catch (\GuzzleHttp\Exception\ClientException $e) {
    //
}

```

## Testing

```bash
// todo
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.


## Credits

- [angel cruz](https://github.com/abr4xas)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
