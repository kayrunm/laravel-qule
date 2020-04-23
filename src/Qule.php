<?php

namespace Kayrunm\Qule\Laravel;

use Kayrunm\Qule\QuleManager;
use Illuminate\Support\Facades\Facade;

class Qule extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return QuleManager::class;
    }
}
