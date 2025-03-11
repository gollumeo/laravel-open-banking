<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Auth;

use Fintrack\LaravelOpenBanking\Contracts\AuthContract;

final class OAuthManager implements AuthContract
{
    private bool $isAuthenticated = false;

    /**
     * {@inheritDoc}
     */
    public function authenticate(): string
    {
        $token = '';
        $this->isAuthenticated = true;

        return $token;
    }

    /**
     * {@inheritDoc}
     */
    public function isAuthenticated(): bool
    {
        return $this->isAuthenticated;
    }

    /**
     * {@inheritDoc}
     */
    public function revoke(): bool
    {
        $this->isAuthenticated = false;

        return true;
    }
}
