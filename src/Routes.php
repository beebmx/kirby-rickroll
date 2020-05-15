<?php

namespace Beebmx\KirbyRickroll;

use Kirby\Cms\Response;

class Routes
{
    public static function all(): array
    {
        return static::prepare();
    }

    protected static function prepare(): array
    {
        $routes = [];

        foreach (static::getUrls() as $url) {
            $routes[] = [
                'pattern' => $url,
                'action' => function () use ($url) {
                    kirby()->trigger('beebmx.kirby-rickroll.hit', $url);
                    return Response::redirect(Routes::getRedirectUrl());
                }
            ];
        }

        return $routes;
    }

    public static function getUrls(): array
    {
        return option('beebmx.kirby-rickroll.urls', []);
    }

    public static function getRedirectUrl(): string
    {
        return option('beebmx.kirby-rickroll.redirect');
    }
}
