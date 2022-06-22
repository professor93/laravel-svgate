# Svgate client for Laravel 9.x applications

[![Latest Version on Packagist](https://img.shields.io/packagist/v/uzbek/laravel-svgate.svg?style=flat-square)](https://packagist.org/packages/uzbek/laravel-svgate)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/uzbek/laravel-svgate/run-tests?label=tests)](https://github.com/uzbek/laravel-svgate/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/uzbek/laravel-svgate/Check%20&%20fix%20styling?label=code%20style)](https://github.com/uzbek/laravel-svgate/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/uzbek/laravel-svgate.svg?style=flat-square)](https://packagist.org/packages/uzbek/laravel-svgate)

SV-Gate (uzcard processing center) client for Laravel.

## Installation

You can install the package via composer:

```bash
composer require uzbek/laravel-svgate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-svgate-config"
```


## Usage

```php
$svgate = new Uzbek\Svgate();
echo $svgate->run('cards.get');
```

## Testing

Not implemented yet

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Inoyatulloh](https://github.com/professor93)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
