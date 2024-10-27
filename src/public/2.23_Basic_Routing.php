<?php

require_once __DIR__ . '/../vendor/autoload.php';

// это работает с index

$router = new \app\Classes\Router();

$router
    ->register('/', [app\Controllers\HomeController::class, 'index'])
    ->register('/invoices', [app\Controllers\InvoiceController::class, 'index'])
    ->register('/invoices/create', [app\Controllers\InvoiceController::class, 'create']);

echo $router->resolve($_SERVER['REQUEST_URI']);
