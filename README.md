# Laravel SDK for Docuseal

[![Latest Version on Packagist](https://img.shields.io/packagist/v/docuseal/docuseal-laravel.svg?style=flat-square)](https://packagist.org/packages/docuseal/docuseal-laravel)
[![Tests](https://github.com/abishekrsrikaanth/docuseal-laravel/actions/workflows/run-tests.yml/badge.svg)](https://github.com/abishekrsrikaanth/docuseal-laravel/actions/workflows/run-tests.yml)
[![Code Style Status](https://github.com/abishekrsrikaanth/docuseal-laravel/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/abishekrsrikaanth/docuseal-laravel/actions/workflows/fix-php-code-style-issues.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/docuseal/docuseal-laravel.svg?style=flat-square)](https://packagist.org/packages/docuseal/docuseal-laravel)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/docuseal-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/docuseal-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can
support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using.
You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards
on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require docuseal/docuseal-laravel
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="docuseal-laravel-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="docuseal-laravel-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="docuseal-laravel-views"
```

## Usage

```php
$docuseal = new Docuseal\Docuseal();
echo $docuseal->echoPhrase('Hello, Docuseal!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Abishek R Srikaanth](https://github.com/abishekrsrikaanth)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
