<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\OpenBankingProviders\TinkProvider;
use Support\OpenBankingProvidersHelper;

describe('OpenBankingProvider', function () {
    it('should be able to fetch providers namespaces', function () {
        $providers = OpenBankingProvidersHelper::getProviders();

        expect($providers)->toBeArray();
        foreach ($providers as $provider) {
            expect($provider)->toBeClass();
        }
    });

    it('should implement `OpenBankingProviderContract`', function () {
        $provider = new TinkProvider();
        todo('create contract');
        expect($provider)->toBeInstanceOf(OpenBankingProviderContract::class);
    });
});
