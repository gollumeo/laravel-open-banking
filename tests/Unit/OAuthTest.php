<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Auth\OAuthManager;
use Fintrack\LaravelOpenBanking\Contracts\AuthContract;

describe('High Level & Abstraction', function () {
    beforeEach(function () {
        $this->authManager = new OAuthManager();
    });

    it('should act as an Adapter for Tink and implement `AuthContract`', function () {
        expect(OAuthManager::class)->toImplement(AuthContract::class);
    });
});

describe('`authenticate()`', function () {
    it('should return a string when calling authenticating', function () {
        expect($this->authManager->authenticate())->toBeString();
    });

    it('should return a valid non-empty string when authenticating', function () {
        $token = $this->authManager->authenticate();
        expect($token)->not->toBeEmpty()->and($token)->toBeString();
    });

    it('should return a valid OAuth token format', function () {
        $token = $this->authManager->authenticate();
        expect($token)->toMatch('/^[a-zA-Z0-9-_]{10,}$/');
    });

    it('should not be authenticated by default', function () {
        expect($this->authManager->isAuthenticated())->toBeFalse();
    });
});

describe('`isAuthenticated()`', function () {
    it('should update authentication state after authenticating', function () {
        expect($this->authManager->isAuthenticated())->toBeFalse();
        $this->authManager->authenticate();
        expect($this->authManager->isAuthenticated())->toBeTrue();
    });
});

describe('`revoke()`', function () {
    it('should return false after revoking authentication', function () {
        $this->authManager->authenticate();
        $this->authManager->revoke();
        expect($this->authManager->isAuthenticated())->toBeFalse();
    });

    it('should be successful when revoking an active authentication', function () {
        $this->authManager->authenticate();
        expect($this->authManager->revoke())->toBeTrue()->and($this->authManager->isAuthenticated())->toBeFalse();
    });
});

describe('OAuth scenarios', function () {
    it('should remain unauthenticated if revoking without prior authentication', function () {
        expect($this->authManager->isAuthenticated())->toBeFalse()
            ->and($this->authManager->revoke())->toBeFalse()
            ->and($this->authManager->isAuthenticated())->toBeFalse();
    });
});
