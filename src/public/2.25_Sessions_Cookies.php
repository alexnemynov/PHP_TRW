<?php

require_once __DIR__ . '/../vendor/autoload.php';

// это работает с index

session_start();

$router = new \app\Classes\Router();

$router
    ->get('/', [app\Controllers\HomeController::class, 'index'])
    ->get('/invoices', [app\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [app\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [app\Controllers\InvoiceController::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

var_dump($_SESSION);

// вот это в index(): $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
// вот это в index():    setcookie(
//            'userName',
//            'aerohcss',
//            time() + (24 * 60 * 60),
//        );
var_dump($_COOKIE);