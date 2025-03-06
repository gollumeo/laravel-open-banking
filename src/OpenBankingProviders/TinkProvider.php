<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\OpenBankingProviders;

use Fintrack\LaravelOpenBanking\Contracts\OpenBankingProviderContract;

final class TinkProvider implements OpenBankingProviderContract
{
    /**
     * @return string[]
     */
    public function getTransactions(): array
    {
        return [];
    }
}
