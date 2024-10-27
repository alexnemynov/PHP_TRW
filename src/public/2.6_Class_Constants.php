<?php

use app\Classes\Enums\Status;
use app\Classes\PaymentGateway\Paddle\Transaction;

require __DIR__ . '/../vendor/autoload.php';

$transaction = new Transaction();

//var_dump(Transaction::STATUS_PAID);
//var_dump($transaction::STATUS_PAID);

//echo $transaction::class . PHP_EOL;
//echo Transaction::class . PHP_EOL;

//$transaction->setStatus('paid');
$transaction->setStatus(Status::PAID);
var_dump($transaction);