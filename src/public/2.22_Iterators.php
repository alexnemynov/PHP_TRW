<?php

use app\Classes\Iterators\Invoice;
use app\Classes\Iterators\InvoiceCollection;
use app\Classes\Iterators\InvoiceCollection2;
use app\Classes\Iterators\InvoiceCollection3;

require_once __DIR__ . '/../vendor/autoload.php';

$invoiceCollection = new InvoiceCollection([
    new Invoice(15),
    new Invoice(25),
    new Invoice(50),]);

foreach ($invoiceCollection as $invoice) {
    echo $invoice->id . ' - ' . $invoice->amount . PHP_EOL;
}

$invoiceCollection2 = new InvoiceCollection2([
    new Invoice(15),
    new Invoice(25),
    new Invoice(50),]);

foreach ($invoiceCollection2 as $invoice) {
    echo $invoice->id . ' - ' . $invoice->amount . PHP_EOL;
}

$invoiceCollection3 = new InvoiceCollection3([
    new Invoice(15),
    new Invoice(25),
    new Invoice(50),]);

foreach ($invoiceCollection3 as $invoice) {
    echo $invoice->id . ' - ' . $invoice->amount . PHP_EOL;
}

foo($invoiceCollection3);
function foo(iterable $iterable): void
{
    foreach ($iterable as $item) {
        echo $item->id . ' - ' . $item->amount . PHP_EOL;
    }
}