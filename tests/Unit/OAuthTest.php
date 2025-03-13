<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Auth\OAuthManager;
use Fintrack\LaravelOpenBanking\Contracts\AuthContract;
use Support\Fakes\FakeOAuthClient;

describe('OAuth', function () {
    it('should implement `AuthContract`', function () {
        expect(OAuthManager::class)->toImplement(AuthContract::class)
            ->and(FakeOAuthClient::class)->toImplement(AuthContract::class);
    });

    it('should return a string when calling `authenticate`', function () {
        expect($this->authManager->authenticate())->toBeString();
    });

    it('should return a fake token', function () {
        expect($this->authManager->authenticate())->toBe('fake-token-123');
    });

    it('should not be authenticated by default', function () {
        expect($this->authManager->isAuthenticated())->toBeFalse();
    });

    it('should return true after authentication', function () {
        $this->authManager->authenticate();
        expect($this->authManager->isAuthenticated())->toBeTrue();
    });

    it('should return false after revoking authentication', function () {
        $this->authManager->authenticate();
        $this->authManager->revoke();
        expect($this->authManager->isAuthenticated())->toBeFalse();
    });

    it('should return false if revoking without prior authentication', function () {
        expect($this->authManager->revoke())->toBeFalse();
    });
});
