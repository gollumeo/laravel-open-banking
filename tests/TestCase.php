<?php

declare(strict_types=1);

namespace Tests;

use Fintrack\LaravelOpenBanking\Auth\OAuthManager;
use Fintrack\LaravelOpenBanking\Contracts\AuthContract;
use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected ?AuthContract $authManager = null;

    protected string $providerClass = '';

    protected ?OpenBankingProviderContract $provider = null;

    protected ?AuthContract $fakeOAuthClient = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->authManager = new OAuthManager();
    }
}
