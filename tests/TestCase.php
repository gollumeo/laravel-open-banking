<?php

declare(strict_types=1);

namespace Tests;

use Fintrack\LaravelOpenBanking\OpenBankingServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            OpenBankingServiceProvider::class,
        ];
    }
}
