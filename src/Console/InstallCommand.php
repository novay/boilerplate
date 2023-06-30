<?php

namespace Novay\Boilerplate\Console;

class InstallCommand extends \Illuminate\Console\Command
{
    use InstallBoilerplate;

    protected $signature = 'boilerplate:install {--pest : Indicate that Pest should be installed}
                {--ssr : Indicates if Inertia SSR support should be installed}
                {--composer=global : Absolute path to the Composer binary which should be used to install packages}';

    protected $description = 'Install the Boilerplate controllers and resources';

    public function handle()
    {
        return $this->boiled();
    }
}