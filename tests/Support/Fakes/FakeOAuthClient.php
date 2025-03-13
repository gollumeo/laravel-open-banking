<?php

declare(strict_types=1);

namespace Support\Fakes;

use Exception;
use Fintrack\LaravelOpenBanking\Contracts\AuthContract;

final class FakeOAuthClient implements AuthContract
{
    private bool $isAuthenticated = false;

    /**
     * {@inheritDoc}
     */
    public function authenticate(): string
    {
        try {
            sleep(1);
            $this->isAuthenticated = true;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }

        return 'fake-token-123';
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
        if (! $this->isAuthenticated) {
            return false;
        }

        $this->isAuthenticated = false;

        return true;
    }
}
