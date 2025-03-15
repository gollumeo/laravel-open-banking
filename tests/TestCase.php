<?php

declare(strict_types=1);

namespace Tests;

use Fintrack\LaravelOpenBanking\Auth\OAuthManager;
use Fintrack\LaravelOpenBanking\Contracts\AuthContract;
use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;
use Fintrack\LaravelOpenBanking\OpenBankingProviders\TinkProvider;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Support\Fakes\FakeOAuthClient;

abstract class TestCase extends BaseTestCase
{
    protected AuthContract $authManager;

    protected AuthContract $fakeAuthManager;

    protected string $providerClass;

    protected OpenBankingProviderContract $provider;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authManager = new OAuthManager();
        $this->fakeAuthManager = new FakeOAuthClient();
        $this->providerClass = TinkProvider::class;
        $this->provider = new TinkProvider();
    }
}
