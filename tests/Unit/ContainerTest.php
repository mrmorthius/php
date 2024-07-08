<?php

use Core\Container;

test('container can bind and resolve', function () {
    $container = new Container;
    $container->bind("foo", fn () => "bar");

    $result = $container->resolve('foo');
    expect($result)->ToBe('bar');
});
