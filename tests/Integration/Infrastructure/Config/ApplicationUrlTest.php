<?php

declare(strict_types=1);

use Fintrack\LaravelOpenBanking\Infrastructure\Config\ApplicationUrl;

describe('Unit: Application URL', function () {
    it('should retrieve the base URL via the configuration key', function () {
        $baseAppUrl = ApplicationUrl::fromConfig();

        expect($baseAppUrl)->toEqual(config('app.url'));
    });

    it('should throw an IllegalArgumentException if the app.url key does not exist', function () {
        config(['app.url' => 123]);
        // lambda
        expect(fn () => ApplicationUrl::fromConfig())->toThrow(InvalidArgumentException::class);
    });
});
