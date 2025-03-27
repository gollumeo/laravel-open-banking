<?php

declare(strict_types=1);

use Support\Fakes\FakeTinkOAuthClient;

describe('OAuth token expiration', function () {
    beforeEach(closure: function () {
        $this->fakeOAuthClient = new FakeTinkOAuthClient();
    });
    it('should return a valid token', function () {
        $this->fakeOAuthClient->authenticate();

        todo('correct & implement this expiration feature');
        expect($this->fakeOAuthClient->token)->toBeString()
            ->and($this->fakeOAuthClient->token)->toBe('dummy-access-token')
            ->and($this->fakeOAuthClient->hasTokenExpired())->toBeTrue();
    });
});
