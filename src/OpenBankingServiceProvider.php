<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking;

use Illuminate\Support\ServiceProvider;

final class OpenBankingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/openbanking.php',
            'openbanking'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/openbanking.php' => config_path('openbanking.php'),
        ], 'openbanking');
    }
}
