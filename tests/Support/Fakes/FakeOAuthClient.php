<?php

declare(strict_types=1);

namespace Support\Fakes;

use Fintrack\LaravelOpenBanking\Contracts\AuthContract;
use Nette\NotImplementedException;

final class FakeOAuthClient implements AuthContract
{
    /**
     * {@inheritDoc}
     */
    public function authenticate(): string
    {
        throw new NotImplementedException();
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
