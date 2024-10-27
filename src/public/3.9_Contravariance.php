<?php

declare(strict_types=1);

use app\Classes\Variance\CatShelter;
use app\Classes\Variance\DogShelter;
use app\Classes\Variance\AnimalFood;
use app\Classes\Variance\Food;

require_once __DIR__ . '/../vendor/autoload.php';

$kitty = (new CatShelter())->adopt("Ricky");
$catFood = new AnimalFood();
$kitty->eat($catFood);
echo "\n";

$doggy = (new DogShelter())->adopt("Mavrick");
$banana = new Food();
$doggy->eat($banana);
$doggy->eat($catFood); // LISKOV SUBSTITUTION PRINCIPLE
