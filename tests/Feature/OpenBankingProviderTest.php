<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;
use Fintrack\LaravelOpenBanking\OpenBankingProviders\TinkProvider;
use Support\OpenBankingProvidersHelper;
use Tests\TestCase;

describe('OpenBanking namespaces', function () {
    it('should be able to fetch providers namespaces', function () {
        $providers = OpenBankingProvidersHelper::getProviders();

        expect($providers)->toBeArray();
        foreach ($providers as $provider) {
            expect($provider)->toBeClass();
        }
    });
});

describe('OpenBankingProvider', function () {
    pest()->extend(TestCase::class);

    beforeEach(function () {
        $this->providerClass = TinkProvider::class;
        $this->provider = new TinkProvider();
    });

    it('should implement `OpenBankingProviderContract`', function () {
        expect($this->providerClass)->toImplement(OpenBankingProviderContract::class);
    });

    it('should be able to retrieve transactions', function () {
        $transactions = $this->provider->getTransactions();
        expect($transactions)->toBeArray();
    });
});
