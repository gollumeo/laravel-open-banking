<?php

declare(strict_types=1);

describe('OAuth', function () {
    it('should implement `AuthContract`', function () {
        expect(OAuthManager::class)->toBeClass()
            ->and(OAuthManager::class)->toImplement(AuthContract::class);
    });
});
