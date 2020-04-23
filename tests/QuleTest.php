<?php

namespace Kayrunm\Qule\Laravel\Tests;

use Kayrunm\Qule\QuleManager;
use Kayrunm\Qule\Laravel\Qule;
use Orchestra\Testbench\TestCase;

class QuleTest extends TestCase
{

    /** @test */
    public function it_resolves_to_qule_manager_instance(): void
    {
        $instance = Qule::getFacadeRoot();

        $this->assertInstanceOf(QuleManager::class, $instance);
    }
}
