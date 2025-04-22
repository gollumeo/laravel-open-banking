<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Auth\OpenBankingAuth;
use Fintrack\LaravelOpenBanking\Infrastructure\Config\ApplicationUrl;

describe('Feature: Generic Authentication', function () {
    it('should have access to a redirect URL when initiating authentication flow', function () {
        // Given
        $openBankingAuth = new OpenBankingAuth();
        // When
        $oauthRedirectUrl = $openBankingAuth->init();
        // Then
        expect($oauthRedirectUrl)->toBeString();
    });

    it('should return a non-empty redirect URL when initiating authentication flow', function () {
        // Given
        $openBankingAuth = new OpenBankingAuth();
        // When
        $oauthRedirectUrl = $openBankingAuth->init();
        // Then
        expect($oauthRedirectUrl)->not->toBeEmpty();
    });

    it('should return a valid, app-based redirect URL when initiating authentication flow', function () {
        $appUrlPrefix = ApplicationUrl::fromConfig();
        $expectedUrl = $appUrlPrefix.'/oauth-redirect';

        // Given
        $openBankingAuth = new OpenBankingAuth();
        // When
        $oauthRedirectUrl = $openBankingAuth->init();
        // Then
        expect($oauthRedirectUrl)->toBe($expectedUrl);
    });
});
