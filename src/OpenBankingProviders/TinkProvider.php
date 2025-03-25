<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\OpenBankingProviders;

use Fintrack\LaravelOpenBanking\Contracts\OAuthProviderContract;
use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;

final class TinkProvider implements OpenBankingProviderContract
{
    public function __construct(
        private OAuthProviderContract $oauth
    ) {}

    /**
     * @return array<string, array<string>|string>
     */
    public function getTransactions(): array
    {
        $accessToken = $this->oauth->getAccessToken();

        return [
            'token_used' => $accessToken,
            'data' => [''],
        ];
    }
}
