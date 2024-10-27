<?php

declare(strict_types=1);

use app\Classes\WeakMap\Invoice;

require_once __DIR__ . '/../vendor/autoload.php';

$invoice1 = new Invoice();
$map = new WeakMap();

$map[$invoice1] = ['a' => 1, 'b' => 2, 'c' => 3];

var_dump(count($map));
unset($invoice1);
var_dump(count($map));

var_dump($map);


//echo 'Unsetting Invoice1' . PHP_EOL;
//echo 'Unset Invoice1' . PHP_EOL;