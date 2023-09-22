<?php

namespace Novay\Boilerplate\Console;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

use ProtoneMedia\Splade\Commands\InstallsSpladeExceptionHandler;
use ProtoneMedia\Splade\Commands\InstallsSpladeRouteMiddleware;

trait InstallBoilerplate
{
    use InstallsSpladeExceptionHandler;
    use InstallsSpladeRouteMiddleware;
    
    use InstallTests;

    protected function boiled()
    {
        $this->installExceptionHandler();
        $this->installRouteMiddleware();

        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                '@iconify/vue' => '^4.1.1',
                '@protonemedia/laravel-splade' => '^1.3.0',
                '@tailwindcss/forms' => '^0.5.3',
                '@tailwindcss/typography' => '^0.5.2',
                '@vitejs/plugin-vue' => '^3.0.0',
                'autoprefixer' => '^10.4.12',
                'laravel-vite-plugin' => '^0.7.7',
                'postcss' => '^8.4.18',
                'preline' => '^1.8.0',
                'tailwindcss' => '^3.2.1',
                'vite' => '^3.0.0',
                'vue' => '^3.2.41',
            ] + $packages;
        });

        // Add SSR build step...
        $this->updateNodeScript();

        $defaultStubsDir = __DIR__.'/../../stubs/';
        $spladeStubsDir = base_path('vendor/protonemedia/laravel-splade/stubs/');

        // Controllers...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers'));
        (new Filesystem)->copyDirectory($defaultStubsDir.'app/Http/Controllers', app_path('Http/Controllers'));

        // Traits...
        (new Filesystem)->ensureDirectoryExists(app_path('Traits'));
        (new Filesystem)->copyDirectory($defaultStubsDir.'app/Traits', app_path('Traits'));

        // Tables...
        (new Filesystem)->ensureDirectoryExists(app_path('Tables'));
        (new Filesystem)->copyDirectory($defaultStubsDir.'app/Tables', app_path('Tables'));

        // Requests...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory($defaultStubsDir.'app/Http/Requests', app_path('Http/Requests'));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory($defaultStubsDir.'resources/views', resource_path('views'));

        // Components...
        (new Filesystem)->ensureDirectoryExists(app_path('View/Components'));
        (new Filesystem)->copyDirectory($defaultStubsDir.'app/View/Components', app_path('View/Components'));

        // Tests...
        $this->installTests();

        // Routes...
        copy($defaultStubsDir.'routes/web.php', base_path('routes/web.php'));
        copy($defaultStubsDir.'routes/auth.php', base_path('routes/auth.php'));

        // "Dashboard" Route...
        $this->replaceInFile('/home', '/dashboard', app_path('Providers/RouteServiceProvider.php'));

        // Tailwind / Vite...
        copy($spladeStubsDir.'tailwind.config.js', base_path('tailwind.config.js'));
        copy($spladeStubsDir.'postcss.config.js', base_path('postcss.config.js'));
        copy($spladeStubsDir.'vite.config.js', base_path('vite.config.js'));
        copy($spladeStubsDir.'resources/css/app.css', resource_path('css/app.css'));
        copy($spladeStubsDir.'resources/js/app.js', resource_path('js/app.js'));
        copy($spladeStubsDir.'resources/js/ssr.js', resource_path('js/ssr.js'));

        // Custom 
        copy($defaultStubsDir.'tailwind.config.js', base_path('tailwind.config.js'));
        copy($defaultStubsDir.'vite.config.js', base_path('vite.config.js'));
        copy($defaultStubsDir.'resources/css/app.css', resource_path('css/app.css'));
        copy($defaultStubsDir.'resources/js/app.js', resource_path('js/app.js'));
        copy($defaultStubsDir.'resources/js/dark.js', resource_path('js/dark.js'));

        (new Filesystem)->ensureDirectoryExists(resource_path('js/Components'));
        copy($defaultStubsDir.'resources/js/Components/Clock.vue', resource_path('js/Components/Clock.vue'));

        if (file_exists(base_path('pnpm-lock.yaml'))) {
            $this->runCommands(['pnpm install', 'pnpm run build']);
        } elseif (file_exists(base_path('yarn.lock'))) {
            $this->runCommands(['yarn install', 'yarn run build']);
        } else {
            $this->runCommands(['npm install', 'npm run build']);
        }

        $this->line('');
        $this->components->info('Boilerplate scaffolding installed successfully.');
    }

    /**
     * Adds the SSR build step to the 'build' command.
     */
    protected function updateNodeScript(): void
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $packageFile = file_get_contents(base_path('package.json'));

        file_put_contents(
            base_path('package.json'),
            str_replace('"vite build"', '"vite build && vite build --ssr"', $packageFile)
        );
    }
}
