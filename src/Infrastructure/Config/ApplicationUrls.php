<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Infrastructure\Config;

use InvalidArgumentException;

final class ApplicationUrls
{
    public static function getApplicationPrefix(): string
    {
        $baseAppUrl = config('app.url');

        if (! is_string($baseAppUrl)) {
            throw new InvalidArgumentException('The provided configuration key does not exist.');
        }

        return $baseAppUrl;
    }

    public static function getOAuthRedirectSuffix(): string
    {
        $oauthRedirectSuffix = config('openbanking.redirect_suffix') === '' ? '/oauth-redirect' : config('openbanking.redirect_suffix');

        if (! is_string($oauthRedirectSuffix)) {
            throw new InvalidArgumentException('The provided configuration key does not exist.');
        }

        return $oauthRedirectSuffix;
    }
}
