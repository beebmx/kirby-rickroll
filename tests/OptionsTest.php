<?php

namespace Beebmx\KirbyRickroll\Tests;

use Kirby\Cms\App;
use PHPUnit\Framework\TestCase;

class OptionsTest extends TestCase
{
    public function setUp(): void
    {
        require_once dirname(__DIR__) . '/index.php';
    }

    /** @test */
    public function it_has_default_urls()
    {
        $kirby = new App([
            'roots' => [
                'index' => '/dev/null',
            ]
        ]);

        $this->assertNotNull($kirby->option('beebmx.kirby-rickroll.urls'));
        $this->assertIsArray($kirby->option('beebmx.kirby-rickroll.urls'));
    }

    /** @test */
    public function its_overwrite_the_url_settings()
    {
        $kirby = new App([
            'roots' => [
                'index' => '/dev/null',
            ],
            'options' => [
                'beebmx.kirby-rickroll.urls' => $urls = [
                    'admin',
                    'login'
                ],
            ]
        ]);

        $this->assertEquals($urls, $kirby->option('beebmx.kirby-rickroll.urls'));
    }

    /** @test */
    public function it_has_a_default_redirect_url()
    {
        $kirby = new App([
            'roots' => [
                'index' => '/dev/null',
            ]
        ]);

        $this->assertNotNull($kirby->option('beebmx.kirby-rickroll.redirect'));
        $this->assertEquals(
            'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            $kirby->option('beebmx.kirby-rickroll.redirect')
        );
    }
}
