<?php

namespace Kfriars\DiffGraph;

use Kfriars\DiffGraph\Commands\DiffGraphCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DiffGraphServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('diff-graph')
            ->hasCommand(DiffGraphCommand::class);
    }
}
