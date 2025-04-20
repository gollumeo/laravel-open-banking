<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;
use Fintrack\LaravelOpenBanking\OpenBankingProviders\TinkProvider;
use Support\Fakes\FakeTinkOAuthClient;
use Support\OpenBankingProvidersHelper;

// TODO: refactor: split the file based on responsibilities and test cases

describe('Unit: OpenBanking Namespaces', function () {

    it('should return valid provider instances', function () {
        $providers = OpenBankingProvidersHelper::getProviders();
        foreach ($providers as $provider) {
            $instance = new $provider(new FakeTinkOAuthClient());
            expect($instance)->toBeInstanceOf(OpenBankingProviderContract::class);
        }
    });
});

describe('OpenBankingProvider', function () {
    beforeEach(function () {
        $this->providerClass = TinkProvider::class;
        $this->provider = new TinkProvider(new FakeTinkOAuthClient());
    });

    it('should implement `OpenBankingProviderContract`', function () {
        expect($this->providerClass)->toImplement(OpenBankingProviderContract::class);
    });

    it('should be able to retrieve transactions', function () {
        $transactions = $this->provider->getTransactions();
        expect($transactions)->toBeArray();
    });
});
