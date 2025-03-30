<?php

declare(strict_types=1);

namespace Support\Fakes;

use Fintrack\LaravelOpenBanking\Contracts\AuthContract;

final class FakeTinkOAuthClient implements AuthContract
{
    public string $token;

    /** @var array<string> */
    private array $calls = [];

    private bool $isAuthenticated;

    /**
     * {@inheritDoc}
     */
    public function authenticate(): string
    {
        $this->calls[] = 'authenticate';
        $this->token = 'dummy-access-token';

        return $this->token;
    }

    /**
     * {@inheritDoc}
     */
    public function isAuthenticated(): bool
    {
        $this->calls[] = 'isAuthenticated';
        $this->isAuthenticated = true;

        return $this->isAuthenticated;
    }

    /**
     * {@inheritDoc}
     */
    public function revoke(): bool
    {
        $this->calls[] = 'revoke';

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function refresh(): string
    {
        return 'new-dummy-token';
    }

    public function wasCalled(string $method): bool
    {
        return in_array($method, $this->calls);
    }

    public function hasTokenExpired(): bool
    {
        return true;
    }
}
