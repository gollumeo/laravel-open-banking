<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Contracts;

interface OpenBankingProviderContract
{
    public function getTransactions(): array;
}
