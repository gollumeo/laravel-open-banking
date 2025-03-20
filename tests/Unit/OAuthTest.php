<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Auth\OAuthManager;
use Fintrack\LaravelOpenBanking\Contracts\AuthContract;

describe('OAuth', function () {
    beforeEach(function () {
        $this->authManager = new OAuthManager();
    });

    it('should implement `AuthContract`', function () {
        expect(OAuthManager::class)->toImplement(AuthContract::class);
    });

    it('should return a string when calling `authenticate`', function () {
        expect($this->authManager->authenticate())->toBeString();
    });

    it('should not be authenticated by default', function () {
        expect($this->authManager->isAuthenticated())->toBeFalse();
    });

    it('should update authentication state after authenticating', function () {
        expect($this->authManager->isAuthenticated())->toBeFalse();
        $this->authManager->authenticate();
        expect($this->authManager->isAuthenticated())->toBeTrue();
    });

    it('should return false after revoking authentication', function () {
        $this->authManager->authenticate();
        $this->authManager->revoke();
        expect($this->authManager->isAuthenticated())->toBeFalse();
    });

    it('should remain unauthenticated if revoking without prior authentication', function () {
        expect($this->authManager->isAuthenticated())->toBeFalse()
            ->and($this->authManager->revoke())->toBeFalse()
            ->and($this->authManager->isAuthenticated())->toBeFalse();
    });
});
