<?php

require_once __DIR__ . '/../vendor/autoload.php';

// это работает с index

$router = new \app\Classes\Router();

$router
    ->get('/', [app\Controllers\HomeController::class, 'index'])
    ->get('/invoices', [app\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [app\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [app\Controllers\InvoiceController::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
