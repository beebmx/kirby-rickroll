# Kirby Rickroll

**Kirby Rickroll** redirects some visitors than try to "break" into your site. 

## Installation

### Composer

```ssh
composer required beebmx/kirby-rickroll
```

## Usage

After you install the package, your site will going to redirect that visitors to Rick. 

The urls "protected" out of the box are:

```json
[
    "wp-login.php",
    "wp-admin",
    "user/login",
    "admin",
    "composer.lock",
    "yarn.lock",
    ".env"
]
```

## General options

This package comes with some things to configure.

| Option | Value | Description |
| ------ | ----- | ----------- |
| beebmx.kirby-rickroll.urls | (array) | An array of URLs to "protect" |
| beebmx.kirby-rickroll.redirect | (string) | An url to redirect when a protected one is hit |

## Example

Here is an example if you want to change the default settings.

In your `config.php` file just:

```php

return [
    'beebmx.kirby-rickroll.urls' => [
        'admin',
        'my-secure-url',
        'this-is-my-admin-url'
    ],
    'beebmx.kirby-rickroll.redirect' => 'https://youtu.be/RfiQYRn7fBg?t=17',
];

```  

## Hook

If you want to do something when someone hit your URLs, we have you cover.

In your `config.php` file just add the hook:

```php

return [
    'hooks' => [
        'beebmx.kirby-rickroll.hit' => function ($url) {
            //Do something
        }
    ]
];

```  

## Inspiration
This package is inspire by the tweet of [Liam Hammett](https://twitter.com/LiamHammett/status/1260984553570570240).

## License

Copyright © 2019-2020 Fernando Gutierrez [@beebmx](https://github.com/beebmx) and contributors

Licensed under the MIT license, see [LICENSE.md](LICENSE.md) for details.
