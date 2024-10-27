<?php

declare(strict_types=1);

use app\Classes\Variance\CatShelter;
use app\Classes\Variance\DogShelter;

require_once __DIR__ . '/../vendor/autoload.php';

$kitty = (new CatShelter())->adopt("Ricky");
$kitty->speak();
echo "\n";

$doggy = (new DogShelter())->adopt("Mavrick");
$doggy->speak();
