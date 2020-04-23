<?php

namespace Kayrunm\Qule\Laravel;

use GuzzleHttp\Client;
use Kayrunm\Qule\QuleManager;
use Illuminate\Support\ServiceProvider;

class QuleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/qule.php' => config_path('qule.php'),
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/qule.php', 'qule');

        $this->app->singleton(QuleManager::class, function () {
            return new QuleManager(
                config('qule.defaults.query_path'),
                config('qule.defaults.connection')
            );
        });

        $this->registerConnections();
    }

    private function registerConnections(): void
    {
        foreach (config('qule.connections') as $key => $config) {
            Qule::connection($key, new Client($config));
        }
    }
}
