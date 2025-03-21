<?php

declare(strict_types=1);

describe('OAuth Delegation', function () {
    it('should delegate authentication to the injected provider', function () {
        expect($this->authManager->authenticate())->toBe('some-dummy-token')
            ->and($this->authManager->isAuthenticated())->toBeTrue()
            ->and($this->authManager->revoke())->toBeTrue();
    });
});
