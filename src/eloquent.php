<?php

declare(strict_types=1);

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$capsule = new Capsule();

$connectionParams = [
    'database' => $_ENV['DB_DATABASE'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $env['DB_DRIVER'] ?? 'mysql',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
];

$capsule->addConnection($connectionParams);
// Set the event dispatcher used by Eloquent models... (optional)
$capsule->setEventDispatcher(new Dispatcher(new Container()));
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
