<?php

declare(strict_types=1);

namespace Tests;

use Fintrack\LaravelOpenBanking\Contracts\AuthContract;
use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected ?AuthContract $authManager = null;

    protected ?AuthContract $fakeAuthManager = null;

    protected string $providerClass;

    protected OpenBankingProviderContract $provider;
}
