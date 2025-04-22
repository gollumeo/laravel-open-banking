<?php

declare(strict_types=1);

namespace Fintrack\LaravelOpenBanking\Infrastructure\Config;

use InvalidArgumentException;

final class ApplicationUrl
{
    public static function fromConfig(): string
    {
        $baseAppUrl = config('app.url');

        if (! is_string($baseAppUrl)) {
            throw new InvalidArgumentException('The provided configuration key does not exist.');
        }

        return $baseAppUrl;
    }
}
