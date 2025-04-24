<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Domain\OAuth\OAuthRedirect;
use Fintrack\LaravelOpenBanking\Infrastructure\Config\ApplicationUrls;

describe('Integration: OAuthRedirect in a Laravel context', function () {
    it('should use the configured redirect suffix', function () {
        $redirectPrefix = ApplicationUrls::getApplicationPrefix();
        $redirectSuffix = ApplicationUrls::getOAuthRedirectSuffix();
        $expectedUrl = $redirectPrefix.$redirectSuffix;

        expect(OAuthRedirect::generateUrl())->toBe($expectedUrl);
    });
});
