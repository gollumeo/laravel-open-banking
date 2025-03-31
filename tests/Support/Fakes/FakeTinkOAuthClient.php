<?php

declare(strict_types=1);

namespace Support\Fakes;

use Fintrack\LaravelOpenBanking\Contracts\AuthContract;

final class FakeTinkOAuthClient implements AuthContract
{
    private ?string $token;

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
        $this->isAuthenticated = true;

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
        $this->token = null;

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function refresh(): string
    {
        $this->token = 'new-dummy-token';

        return $this->token;
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
