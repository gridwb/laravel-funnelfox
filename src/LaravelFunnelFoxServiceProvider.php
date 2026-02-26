<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelFunnelFoxServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-funnelfox')
            ->hasConfigFile('funnelfox')
            ->hasRoute('funnelfox');
    }
}
