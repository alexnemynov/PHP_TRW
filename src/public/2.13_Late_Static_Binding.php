<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$classA = new \app\Classes\ClassA();
$classB = new \app\Classes\ClassB();

echo $classA->getName() . PHP_EOL;
echo $classB->getName() . PHP_EOL;

echo \app\Classes\ClassA::getName() . PHP_EOL;
echo \app\Classes\ClassB::getName() . PHP_EOL;

var_dump(\app\Classes\ClassB::make());
