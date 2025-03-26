<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Contracts;

interface OpenBankingProviderContract
{
    /**
     * @return array<string|mixed>
     */
    public function getTransactions(): array;
}
