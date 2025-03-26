<?php

declare(strict_types=1);

namespace Support\Fakes;

use Fintrack\LaravelOpenBanking\Contracts\AuthContract;

final class FakeTinkOAuthClient implements AuthContract
{
    /** @var array<string> */
    private array $calls = [];

    /**
     * {@inheritDoc}
     */
    public function authenticate(): string
    {
        $this->calls[] = 'authenticate';

        return 'dummy-access-token';
    }

    /**
     * {@inheritDoc}
     */
    public function isAuthenticated(): bool
    {
        $this->calls[] = 'isAuthenticated';

        return true;
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
}
