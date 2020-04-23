<?php

namespace Kayrunm\Qule\Laravel\Tests;

use Kayrunm\Qule\Laravel\Qule;
use Orchestra\Testbench\TestCase;
use Kayrunm\Qule\Laravel\QuleServiceProvider;

class QuleServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [QuleServiceProvider::class];
    }

    /** @test */
    public function it_configures_defaults(): void
    {
        $this->assertEquals(resource_path('queries'), config('qule.defaults.query_path'));
        $this->assertEquals('default', config('qule.defaults.connection'));
    }

    /** @test */
    public function it_registers_connections(): void
    {
        $connections = Qule::getConnections();

        $this->assertCount(1, $connections);
        $this->assertArrayHasKey('default', $connections);
    }
}
