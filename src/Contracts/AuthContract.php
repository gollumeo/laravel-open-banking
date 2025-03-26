<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Contracts;

interface AuthContract
{
    /**
     * Authenticates the user and returns a credential (token, session, key, etc.).
     *
     * @return string The authentication token.
     */
    public function authenticate(): string;

    /**
     * Checks if the user is authenticated.
     *
     * @return bool True if the user is authenticated, false otherwise.
     */
    public function isAuthenticated(): bool;

    /**
     * Revokes the authentication token.
     *
     * @return bool True if the token was successfully revoked, false otherwise.
     */
    public function revoke(): bool;

    /**
     * Refreshes the credentials (token, session, key, etc.).
     *
     * @return string The new authentication credentials.
     */
    public function refresh(): string;
}
