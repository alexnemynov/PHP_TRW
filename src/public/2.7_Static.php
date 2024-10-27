<?php

use app\Classes\DB;
use app\Classes\PaymentGateway\Paddle\Transaction;

require __DIR__ . '/../vendor/autoload.php';

$transaction = new Transaction(25, 'Transaction 1');

// нельзя обращаться к статическим свойствам через обьект класса ->
// а к методам - можно (но не рекомендуется)
var_dump(Transaction::getCount());
var_dump($transaction->getCount());

$db = DB::getInstance([]);
$db = DB::getInstance([]);

// паттерн фабрика будет что-то типа того
//$transaction = TransactionFactory::make(25, 'Transaction 1');

// иногда callback функции делают static, чтобы к обьекту нельзя было из них обратиться и изменить

$transaction->process();
