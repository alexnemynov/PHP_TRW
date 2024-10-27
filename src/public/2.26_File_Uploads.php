<?php

require_once __DIR__ . '/../vendor/autoload.php';

// это работает с index

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');

$router = new \app\Classes\Router();

$router
    ->get('/', [app\Controllers\HomeController::class, 'index'])
    ->post('/upload', [app\Controllers\HomeController::class, 'upload'])
    ->get('/invoices', [app\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [app\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [app\Controllers\InvoiceController::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);