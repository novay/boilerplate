<?php

namespace Novay\Boilerplate;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class BoilerplateServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/boilerplate.php', 'boilerplate');
    }

    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\InstallCommand::class,
        ]);

        $this->publishes([
            __DIR__ . '/../config/boilerplate.php' => config_path('boilerplate.php'),
        ], 'config');
    }

    public function provides(): array
    {
        return [Console\InstallCommand::class];
    }
}
