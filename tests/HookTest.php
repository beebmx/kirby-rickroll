<?php

namespace Beebmx\KirbyRickroll\Tests;

use Kirby\Cms\App;
use PHPUnit\Framework\TestCase;

class HookTest extends TestCase
{
    public function setUp(): void
    {
        require_once dirname(__DIR__) . '/index.php';
    }

    /** @test */
    public function it_will_trigger_a_hook_when_a_url_its_hit()
    {
        $phpunit = $this;

        $kirby = new App([
            'roots' => [
                'index' => '/dev/null',
            ],
            'hooks' => [
                'beebmx.kirby-rickroll.hit' => function ($url) use ($phpunit) {
                    $phpunit->assertEquals('admin', $url);
                }
            ]
        ]);

        $kirby->call('admin');
    }
}
