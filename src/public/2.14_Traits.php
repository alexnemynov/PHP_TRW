<?php

use app\Classes\CappuccinoMaker;
use app\Classes\CoffeeMaker;
use app\Classes\LatteMaker;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$coffeeMaker = new CoffeeMaker();
$coffeeMaker->makeCoffee();

$latteMaker = new LatteMaker();
$latteMaker->makeCoffee();
$latteMaker->makeLatte();

$cappuccinoMaker = new CappuccinoMaker();
$cappuccinoMaker->makeCoffee();
$cappuccinoMaker->makeCappucino();

$allMaker = new \app\Classes\AllInOneCoffeeMaker();
$allMaker->makeCoffee();
$allMaker->makeLatte();
$allMaker->makeOriginalLatte();
$allMaker->makeCappucino();

\app\Classes\AllInOneCoffeeMaker::foo();
\app\Classes\AllInOneCoffeeMaker::$x;
