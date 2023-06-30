<?php

namespace Novay\Boilerplate\Console;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use RuntimeException;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

trait InstallTests
{
    /**
     * Install Boilerplate's tests.
     *
     * @return void
     */
    protected function installTests()
    {
        (new Filesystem)->ensureDirectoryExists(base_path('tests/Feature'));

        $this->installDusk();
        
        (new Filesystem)->ensureDirectoryExists(base_path('tests/Browser'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/dusk-tests', base_path('tests/Browser'));
        (new Filesystem)->copy(__DIR__.'/../../stubs/dusk-tests/.env.dusk', base_path('.env.dusk'));
        (new Filesystem)->put(base_path('database/database.sqlite'), '');

        if ($this->option('pest')) {
            $this->requireComposerPackages(['pestphp/pest:^1.16', 'pestphp/pest-plugin-laravel:^1.1']);

            (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/pest-tests/Feature', base_path('tests/Feature/Auth'));

            (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/pest-tests/Feature', base_path('tests/Feature'));
            (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/pest-tests/Unit', base_path('tests/Unit'));
            (new Filesystem)->copy(__DIR__.'/../../stubs/pest-tests/Pest.php', base_path('tests/Pest.php'));
        }
    }

    /**
     * Install Laravel Dusk.
     */
    protected function installDusk(): void
    {
        $this->requireComposerPackages(['laravel/dusk', 'protonemedia/laravel-dusk-fakes'], true);

        (new Process([$this->phpBinary(), 'artisan', 'dusk:install'], base_path()))
            ->setTimeout(null)
            ->run(function ($type, $output) {
                $this->output->write($output);
            });
    }

    /**
     * Install the middleware to a group in the application Http Kernel.
     */
    protected function installMiddlewareAfter($after, $name, $group = 'web'): void
    {
        $httpKernel = file_get_contents(app_path('Http/Kernel.php'));

        $middlewareGroups = Str::before(Str::after($httpKernel, '$middlewareGroups = ['), '];');
        $middlewareGroup = Str::before(Str::after($middlewareGroups, "'$group' => ["), '],');

        if (! Str::contains($middlewareGroup, $name)) {
            $modifiedMiddlewareGroup = str_replace(
                $after.',',
                $after.','.PHP_EOL.'            '.$name.',',
                $middlewareGroup,
            );

            file_put_contents(app_path('Http/Kernel.php'), str_replace(
                $middlewareGroups,
                str_replace($middlewareGroup, $modifiedMiddlewareGroup, $middlewareGroups),
                $httpKernel
            ));
        }
    }

    /**
     * Installs the given Composer Packages into the application.
     */
    protected function requireComposerPackages($packages, $dev = false): void
    {
        $composer = $this->option('composer');

        if ($composer !== 'global') {
            $command = ['php', $composer, 'require'];
        }

        $command = array_merge(
            $command ?? ['composer', 'require'],
            $dev ? ['--dev'] : [],
            is_array($packages) ? $packages : func_get_args()
        );

        (new Process($command, base_path(), ['COMPOSER_MEMORY_LIMIT' => '-1']))
            ->setTimeout(null)
            ->run(function ($type, $output) {
                $this->output->write($output);
            });
    }

    /**
     * Update the "package.json" file.
     */
    protected static function updateNodePackages(callable $callback, $dev = true): void
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

    /**
     * Delete the "node_modules" directory and remove the associated lock files.
     */
    protected static function flushNodeModules(): void
    {
        tap(new Filesystem, function ($files) {
            $files->deleteDirectory(base_path('node_modules'));

            $files->delete(base_path('yarn.lock'));
            $files->delete(base_path('package-lock.json'));
        });
    }

    /**
     * Replace a given string within a given file.
     */
    protected function replaceInFile($search, $replace, $path): void
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }

    /**
     * Get the path to the appropriate PHP binary.
     */
    protected function phpBinary(): string
    {
        return (new PhpExecutableFinder())->find(false) ?: 'php';
    }

    /**
     * Run the given commands.
     */
    protected function runCommands($commands): void
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            try {
                $process->setTty(true);
            } catch (RuntimeException $e) {
                $this->output->writeln('  <bg=yellow;fg=black> WARN </> '.$e->getMessage().PHP_EOL);
            }
        }

        $process->run(function ($type, $line) {
            $this->output->write('    '.$line);
        });
    }
}