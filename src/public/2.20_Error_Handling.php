<?php

require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new \app\Classes\ErrorHandling\Invoice(new \app\Classes\ErrorHandling\Customer(['foo' => 'bar']));

try {
    $invoice->process(-25);
} catch (\app\Classes\Exception\MissingBillingINfoException|\app\Classes\Exception\InvoiceException $exception) {
    echo $exception->getMessage() . ' ' . $exception->getFile() . ':' . $exception->getLine() . PHP_EOL;
} finally {
    echo 'Finally block' . PHP_EOL;
}

//set_exception_handler(function (\Throwable $e) {
//    var_dump($e->getMessage());
//});
//
//array_rand([], 1);
//
//$invoice = new \app\ErrorHandling\InvoiceController(new \app\ErrorHandling\Customer());
//
//$invoice->process(25);