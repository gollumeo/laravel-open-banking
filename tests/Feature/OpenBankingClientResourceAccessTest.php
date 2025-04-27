<?php

declare(strict_types=1);

describe('Feature: Data Retrieval', function () {
    it('should allow the developer to retrieve a resource without handling authentication manually', function () {
        $openBanking = new OpenBankingClient();
        $data = $openBanking->getSomeData();

        expect($data)->toBeOpenBankingResource();
    });
});
