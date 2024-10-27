<?php

require_once __DIR__ . '/../vendor/autoload.php';

$invoice1 = new \app\Classes\Invoice1(1, 'My InvoiceController');
$invoice2 = new \app\Classes\Invoice1(1, 'My InvoiceController');

$invoice3 = $invoice1;

echo 'invoice1 == invoice2' . PHP_EOL;
var_dump($invoice1 == $invoice2);

echo 'invoice1 === invoice2' . PHP_EOL;
var_dump($invoice1 === $invoice2);

echo 'invoice1 === invoice3' . PHP_EOL;
var_dump($invoice1 === $invoice3);