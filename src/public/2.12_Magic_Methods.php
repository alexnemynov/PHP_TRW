<?php

use app\Classes\Invoice;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$invoice = new Invoice();

//$invoice->amount = 35;
//
//var_dump(isset($invoice->amount));
//
//unset($invoice->amount);
//
//var_dump(isset($invoice->amount));

//$invoice->process(18, 'some description');
//
//InvoiceController::process(19, 'some static description');

echo $invoice . PHP_EOL;
var_dump($invoice instanceof Stringable);
$invoice();
var_dump($invoice);