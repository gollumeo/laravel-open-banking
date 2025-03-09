<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Auth;

use Fintrack\LaravelOpenBanking\Contracts\AuthContract;
use Nette\NotImplementedException;

final class OAuthManager implements AuthContract
{
    /**
     * {@inheritDoc}
     */
    public function authenticate(): string
    {
        return '';
    }

    /**
     * {@inheritDoc}
     */
    public function isAuthenticated(): bool
    {
        throw new NotImplementedException();
    }

    /**
     * {@inheritDoc}
     */
    public function revoke(): bool
    {
        throw new NotImplementedException();
    }
}
