<?php

declare(strict_types=1);

describe('OpenBankingClient', function () {
    it('authenticates if no valid token exists', function () {
        $client = new OpenBankingClient(new ValidOAuthClient());
        $transactions = $client->getTransactions();

        expect($transactions)->toBeArray();
    });

    it('refreshes token if expired', function () {
        $client = new OpenBankingClient(new ExpiredOAuthClient());
        $accounts = $client->getAccounts();

        expect($accounts)->toBeArray();
    });

    it('throws AuthenticationFailedException if authentication fails', function () {
        $client = new OpenBankingClient(new NullOAuthClient());
        expect(fn () => $client->getBalance())->toThrow(AuthenticationFailedException::class);
    });
});
