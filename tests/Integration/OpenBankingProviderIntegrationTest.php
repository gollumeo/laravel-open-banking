<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;
use Fintrack\LaravelOpenBanking\OpenBankingProviders\TinkProvider;
use Support\Fakes\FakeTinkOAuthClient;

// TODO: refactor: split the file based on responsibilities and test cases
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
