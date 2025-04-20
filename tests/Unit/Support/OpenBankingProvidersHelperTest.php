<?php

declare(strict_types=1);

use Support\OpenBankingProvidersHelper;

it('should be able to fetch providers namespaces', function () {
    $providers = OpenBankingProvidersHelper::getProviders();

    expect($providers)->toBeArray();
    foreach ($providers as $provider) {
        expect($provider)->toBeClass();
    }
});
