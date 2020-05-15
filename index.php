<?php

use Beebmx\KirbyRickroll\Routes;

Kirby::plugin('beebmx/kirby-rickroll', [
    'options' => [
        'urls' => [
            'wp-login.php',
            'wp-admin',
            'user/login',
            'admin',
            'composer.lock',
            'yarn.lock',
            '.env',
        ],
        'redirect' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
    ],
    'routes' => function ($kirby) {
        return Routes::all();
    }
]);
