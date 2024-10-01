<?php

namespace Kfriars\DiffGraph;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Kfriars\DiffGraph\Commands\DiffGraphCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_diff_graph_table')
            ->hasCommand(DiffGraphCommand::class);
    }
}
