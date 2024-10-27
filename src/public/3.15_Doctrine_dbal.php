<?php

declare(strict_types=1);

use Doctrine\DBAL\ArrayParameterType;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\Column;
use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$connectionParams = [
    'dbname' => $_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $env['DB_DRIVER'] ?? 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);

$sql = "SELECT id, created_at FROM invoices_new WHERE created_at BETWEEN :FROM AND :TO";
$stmt = $conn->prepare($sql);

$from = new DateTime('2023-01-01 00:00:00');
$to = new DateTime('2024-09-30 23:00:00');

$stmt->bindValue(':FROM', $from, 'datetime');
$stmt->bindValue(':TO', $to, 'datetime');

$result = $stmt->executeQuery();

//var_dump($result->fetchAllAssociative());

// executeQuery() вызывается под капотом fetchAllAssociative
$stmt = $conn->fetchAllAssociative('SELECT * FROM invoices_new WHERE id IN (?)',
    [[1, 2, 3, 4, 5, 6]],
    [ArrayParameterType::INTEGER]
);
//var_dump($stmt);


// Автокоммит - роллбэк внутри замыкания
//$conn->transactional(function (
//    // some logic
//));

$builder = $conn->createQueryBuilder();

$invoice = $builder
    ->select('id', 'amount')
    ->from('invoices_new')
    ->where('amount > :amount')
    ->setParameter('amount', 6000)
    ->fetchAllAssociative();
//var_dump($invoice);

$schema = $conn->createSchemaManager();

//var_dump($schema->listTableNames());
var_dump(array_map(fn(Column $column) => $column->getName(),$schema->listTableColumns('invoices_new')));