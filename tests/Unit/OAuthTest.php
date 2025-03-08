<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Auth\OAuthManager;
use Fintrack\LaravelOpenBanking\Contracts\AuthContract;

describe('OAuth', function () {
    it('should implement `AuthContract`', function () {
        expect(OAuthManager::class)->toBeClass()
            ->and(OAuthManager::class)->toImplement(AuthContract::class);
    });
});
