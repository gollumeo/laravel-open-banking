<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Contracts;

interface OAuthProviderContract
{
    public function getAccessToken(): string;

    public function isAuthenticated(): bool;

    public function revokeToken(): bool;
}
