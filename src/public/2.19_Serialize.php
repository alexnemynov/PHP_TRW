<?php

require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new \app\Classes\Serialize\Invoice(25, 'description', '123456789');

$str = serialize($invoice);
$invoice2 = unserialize($str);
var_dump($str);
var_dump($invoice2);
