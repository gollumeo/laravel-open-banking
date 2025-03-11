<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Auth\OAuthManager;
use Fintrack\LaravelOpenBanking\Contracts\AuthContract;

describe('OAuth', function () {
    it('should implement `AuthContract`', function () {
        expect(OAuthManager::class)->toImplement(AuthContract::class);
    });

    beforeEach(function () {
        $this->authManager = new OAuthManager();
    });

    it('should return a string when calling `authenticate`', function () {
        expect($this->authManager->authenticate())->toBeString();
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
});
