<?php

use Core\Validator;

test('Validator', function () {
    expect(
        Validator::string('foo')
    )->toBeTrue();
});
