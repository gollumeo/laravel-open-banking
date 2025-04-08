<?php

declare(strict_types=1);

use Support\Fakes\FakeTinkOAuthClient;

describe('Unit: OAuth token expiration', function () {
    describe('FakeTinkOAuthClient', function () {
        beforeEach(closure: function () {
            $this->fakeOAuthClient = new FakeTinkOAuthClient();
        });
        it('should return a valid token', function () {
            $this->fakeOAuthClient->authenticate();

            todo('correct & implement this expiration feature');
            expect($this->fakeOAuthClient->authenticate())->toBeString()
                ->and($this->fakeOAuthClient->authenticate())->toBe('dummy-access-token')
                ->and($this->fakeOAuthClient->hasTokenExpired())->toBeTrue()
                ->and($this->fakeOAuthClient)->toHaveProperty('token');
        });
    });
});
