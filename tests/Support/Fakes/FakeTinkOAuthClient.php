<?php

declare(strict_types=1);

namespace Support\Fakes;

use Fintrack\LaravelOpenBanking\Contracts\OAuthProviderContract;

final class FakeTinkOAuthClient implements OAuthProviderContract
{
    private array $calls = [];

    public function getAccessToken(): string
    {
        $this->calls[] = 'getAccessToken';

        return 'dummy-access-token';
    }

    public function isAuthenticated(): bool
    {
        $this->calls[] = 'isAuthenticated';

        return true;
    }

    public function revokeToken(): bool
    {
        $this->calls[] = 'revokeToken';

        return true;
    }

    public function wasCalled(string $method): bool
    {
        return in_array($method, $this->calls);
    }
}
