<?php

declare(strict_types=1);

namespace Tests;

use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected ?string $providerClass = null;

    protected ?OpenBankingProviderContract $provider = null;
}
