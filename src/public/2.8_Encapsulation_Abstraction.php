<?php

use app\Classes\PaymentGateway\Paddle\Transaction;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$transaction = new Transaction(25);

$reflectionProperty = new \ReflectionProperty(Transaction::class, 'amount');
$reflectionProperty->setAccessible(true);

$reflectionProperty->setValue($transaction, 125);

var_dump($reflectionProperty->getValue($transaction));

$transaction->process();

$transaction->copyFrom(new Transaction(100));