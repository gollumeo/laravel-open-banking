<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Auth;

use Fintrack\LaravelOpenBanking\Infrastructure\Config\ApplicationUrls;

final class OpenBankingAuth
{
    public function init(): string
    {
        return ApplicationUrls::getApplicationPrefix().ApplicationUrls::getOAuthRedirectSuffix();
    }
}
