<?php

// кастомный автолоадер
//spl_autoload_register(function ($class) {
//    $path = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
//    if (file_exists($path)) {
//        require $path;
//    }
//});

require __DIR__ . '/../vendor/autoload.php';

$id = new \Ramsey\Uuid\UuidFactory();

echo $id->uuid4();

use app\Classes\PaymentGateway\Paddle\Transaction;

$paddleTransaction = new Transaction();

var_dump($paddleTransaction);
