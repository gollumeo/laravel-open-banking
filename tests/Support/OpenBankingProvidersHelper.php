<?php

declare(strict_types=1);

namespace Support;

final class OpenBankingProvidersHelper
{
    /**
     * @return array<string>
     */
    public static function getProviders(): array
    {
        $clientsDirectory = self::getClientsDirectory();

        $providers = self::extractOpenBankingProvidersFromParentDirectory($clientsDirectory);

        return self::processProvidersFileNameToClass($providers);
    }

    private static function getClientsDirectory(): string
    {
        return dirname(__DIR__, 2).'\\src\\OpenBankingProviders';
    }

    /**
     * @return array<string>
     */
    private static function extractOpenBankingProvidersFromParentDirectory(string $directory): array
    {
        return array_filter(scandir($directory), function (string $file) {
            return ! in_array($file, ['.', '..']);
        });
    }

    /**
     * @param  array<string>  $providers
     * @return array<string>
     */
    private static function processProvidersFileNameToClass(array $providers): array
    {
        $namespace = 'Fintrack\\LaravelOpenBanking\\OpenBankingProviders\\';

        return array_map(fn (string $filename) => $namespace.pathinfo($filename, PATHINFO_FILENAME), $providers);
    }
}
