<?php

// Classes & Objects

declare(strict_types=1);

use app\Classes\Transaction;

require_once '../Transaction.php';

$transaction1 = (new Transaction(100, 'Transaction 1'))
    ->addTax(8)
    ->applyDiscount(10);

$transaction2 = (new Transaction(200, 'Transaction 2'))
    ->addTax(8)
    ->applyDiscount(15);


//exit(); // все равно вызовется дестрактор
$amount = $transaction1->getAmount();
unset($transaction1); // same with
//$transaction1 = null;

var_dump($amount, $transaction2->getAmount());


// stdClass & object casting

$str = '{"a":1, "b":2, "c":3}';

$arr = json_decode($str);
var_dump($arr);

$arr = json_decode($str, true);
var_dump($arr);

$obj = new \stdClass();

$obj->a = 1;
$obj->b = 2;

var_dump($obj);

$arr = [1, 2, 3];

$obj = (object) $arr; // casting = Преобразование в объект

var_dump($obj->{1});

$obj = (object) 1;
var_dump($obj);
var_dump($obj->scalar);

$obj = (object) 'adffsdasa';
var_dump($obj);
var_dump($obj->scalar);

$obj = (object) null;
var_dump($obj);
