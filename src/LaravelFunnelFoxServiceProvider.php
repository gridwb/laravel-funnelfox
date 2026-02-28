<?php

declare(strict_types=1);

namespace Gridwb\LaravelFunnelFox;

use Gridwb\LaravelFunnelFox\Contracts\ApiClientContract;
use Gridwb\LaravelFunnelFox\Contracts\ClientContract;
use Illuminate\Support\Facades\Config;
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

    public function packageRegistered(): void
    {
        $this->app->singleton(ApiClientContract::class, function (): ApiClient {
            /** @var string $apiUrl */
            $apiUrl = Config::get('funnelfox.api_url');
            /** @var string $apiKey */
            $apiKey = Config::get('funnelfox.api_key');

            return new ApiClient($apiUrl, $apiKey);
        });

        $this->app->singleton(ClientContract::class, Client::class);
        $this->app->alias(ClientContract::class, 'funnelfox');
    }
}
