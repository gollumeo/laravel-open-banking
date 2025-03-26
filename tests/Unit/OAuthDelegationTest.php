<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\OpenBankingProviders\TinkProvider;
use Support\Fakes\FakeTinkOAuthClient;

describe('OAuth Delegation', function () {
    beforeEach(function () {
        $this->fakeOAuthClient = new FakeTinkOAuthClient();
        $this->provider = new TinkProvider($this->fakeOAuthClient);
    });

    it('should delegate OAuth calls to the injected OAuth provider', function () {
        expect($this->provider->getTransactions())->toBeArray()
            ->and($this->fakeOAuthClient->wasCalled('authenticate'))->toBeTrue();
    });
});
