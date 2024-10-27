<?php

declare(strict_types=1);

use app\Classes\Enums\Payment;
use app\Classes\Enums\PaymentStatus;
use app\Classes\ReadOnlyProperties\Address;

require_once __DIR__ . '/../vendor/autoload.php';

//$array1 = ['a' => 1, 'b' => 2, 3];
//$array2 = ['b' => 4, 5, 6];
//
//$array3 = [...$array1, ...$array2];
//var_dump($array3);

//$payment = new Payment();
//$payment->updateStatus(PaymentStatus::PAID);
//var_dump($payment->getStatus());
//echo $payment->getStatus()->name . PHP_EOL;
//echo $payment->getStatus()->text() . PHP_EOL;
//echo $payment->getStatus()->value . PHP_EOL;

$address = new Address(
    '123 Main st',
    'NY',
    'NY',
    '10011',
    'US',
);

//echo $address->street . PHP_EOL;
//$address->city = 'KGD';

function foo(): never
{
    echo 1;
    exit();
}

//foo();
echo 'This is never shoud typed' . PHP_EOL;

//$list = ['a', 'b', 'c'];
//$notList = [1 => 'a', 'b', 'c'];
//
//var_dump(array_is_list($list));
//var_dump(array_is_list($notList));
//
//$list = array_filter($list, fn($item) => $item != 'b');
//var_dump($list);
//var_dump(array_is_list($list));
//
//$list = array_values($list);
//var_dump($list);
//var_dump(array_is_list($list));


function sum(float ...$num): float
{
    return array_sum($num);
}

$closure = Closure::fromCallable('sum');
$closure = sum(...); // FROM PHP 8.1

var_dump($closure);

echo $closure(2, 5) . PHP_EOL;
