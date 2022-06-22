<?php

namespace Uzbek\Svgate;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Uzbek\Svgate\Commands\SvgateCommand;

class SvgateServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-svgate')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-svgate_table')
            ->hasCommand(SvgateCommand::class);
    }
}
