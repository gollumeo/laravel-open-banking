<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Auth;

use Fintrack\LaravelOpenBanking\Infrastructure\Config\ApplicationUrl;

final class OpenBankingAuth
{
    public function init(): string
    {
        return ApplicationUrl::fromConfig().'/oauth-redirect';
    }
}
