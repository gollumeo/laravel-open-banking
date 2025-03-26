<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\OpenBankingProviders;

use Fintrack\LaravelOpenBanking\Contracts\AuthContract;
use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;

final readonly class TinkProvider implements OpenBankingProviderContract
{
    public function __construct(
        private AuthContract $oauth
    ) {}

    /**
     * @return array<string, array<string>|string>
     */
    public function getTransactions(): array
    {
        $accessToken = $this->oauth->authenticate();

        return [
            'token_used' => $accessToken,
            'data' => [''],
        ];
    }
}
