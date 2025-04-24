<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Domain\OAuth;

use Fintrack\LaravelOpenBanking\Infrastructure\Config\ApplicationUrls;

final class OAuthRedirect
{
    public static function generateUrl(): string
    {
        return ApplicationUrls::getApplicationPrefix().ApplicationUrls::getOAuthRedirectSuffix();
    }
}
