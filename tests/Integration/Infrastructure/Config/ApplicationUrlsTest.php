<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Infrastructure\Config\ApplicationUrls;

describe('Integration: Application URL in a Laravel context', function () {
    describe('Application Prefix retrieval', function () {
        it('should retrieve the base URL via the configuration key', function () {
            $baseAppUrl = ApplicationUrls::getApplicationPrefix();

            expect($baseAppUrl)->toEqual(config('app.url'));
        });

        it('should throw an IllegalArgumentException if the app.url key is not a string', function () {
            config(['app.url' => 123]);

            expect(fn () => ApplicationUrls::getApplicationPrefix())->toThrow(InvalidArgumentException::class);
        });
    });

    describe('Application Redirect Suffix retrieval', function () {
        it('should retrieve the OAuth redirect suffix via the configuration key', function () {
            $oauthRedirectSuffix = ApplicationUrls::getOAuthRedirectSuffix();

            expect($oauthRedirectSuffix)->toEqual(config('openbanking.redirect_suffix'));
        });

        it('should return a default redirect suffix if the string is empty', function () {
            config(['openbanking.redirect_suffix' => '']);

            $oauthRedirectSuffix = ApplicationUrls::getOAuthRedirectSuffix();

            expect($oauthRedirectSuffix)->not()->toBeEmpty()->toBe('/oauth-redirect');
        });

        it('should throw an IllegalArgumentException if the openbanking.redirect_suffix key is not a string', function () {
            config(['openbanking.redirect_suffix' => null]);

            expect(fn () => ApplicationUrls::getOAuthRedirectSuffix())->toThrow(InvalidArgumentException::class);
        });
    });
});
