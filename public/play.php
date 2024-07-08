<?php
require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Support\Collection;

$collection = new Collection([1, 2, 3, 4, 5]);

var_dump($collection->map(fn ($item) => $item * 2)->toArray());
