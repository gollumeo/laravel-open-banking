<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;
use Support\Fakes\FakeTinkOAuthClient;
use Support\OpenBankingProvidersHelper;

it('should be able to fetch providers namespaces', function () {
    $providers = OpenBankingProvidersHelper::getProviders();

    expect($providers)->toBeArray();
    foreach ($providers as $provider) {
        expect($provider)->toBeClass();
    }
});

it('should return valid provider instances', function () {
    $providers = OpenBankingProvidersHelper::getProviders();
    foreach ($providers as $provider) {
        $instance = new $provider(new FakeTinkOAuthClient());
        expect($instance)->toBeInstanceOf(OpenBankingProviderContract::class);
    }
});
