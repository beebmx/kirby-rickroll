<?php

namespace Beebmx\KirbyRickroll\Tests;

use Beebmx\KirbyRickroll\Routes;
use Kirby\Cms\App;
use Kirby\Cms\Response;
use PHPUnit\Framework\TestCase;

class RoutesTest extends TestCase
{
    public $kirby;

    public $urls;

    public $redirect;

    public function setUp(): void
    {
        require_once dirname(__DIR__) . '/index.php';

        $this->urls = [
            'admin',
            'login'
        ];

        $this->redirect = 'https://foo.bar';

        $this->kirby = new App([
            'roots' => [
                'index' => '/dev/null',
            ],
            'options' => [
                'beebmx.kirby-rickroll.urls' => $this->urls,
                'beebmx.kirby-rickroll.redirect' => $this->redirect,
            ]
        ]);
    }

    /** @test */
    public function it_returns_an_array_with_all_the_routes_to_be_redirected()
    {
        $this->assertIsArray(Routes::getUrls());
        $this->assertEquals($this->urls, Routes::getUrls());
    }

    /** @test */
    public function it_returns_an_string_with_the_url_to_redirect()
    {
        $this->assertIsString(Routes::getRedirectUrl());
        $this->assertSame($this->redirect, Routes::getRedirectUrl());
    }

    /** @test */
    public function it_returns_an_array_with_all_routes()
    {
        $this->assertIsArray(Routes::all());
    }

    /** @test */
    public function it_returns_valid_path_urls()
    {
        $this->assertEquals($this->urls[0], Routes::all()[0]['pattern']);
        $this->assertEquals($this->urls[1], Routes::all()[1]['pattern']);
    }

    /** @test */
    public function it_returns_a_redirection_of_every_url()
    {
        $this->assertInstanceOf(Response::class, $this->kirby->call(Routes::all()[0]['pattern']));
        $this->assertInstanceOf(Response::class, $this->kirby->call(Routes::all()[1]['pattern']));
    }
}
