<?php

declare(strict_types=1);

use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use App\Enums\InvoiceStatus;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;
use Doctrine\ORM\EntityManager;

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

$connection = DriverManager::getConnection($connectionParams);

$entityManager = new EntityManager(
    $connection,
    ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/Entity'])
);

$items = [['Item 1', 1, 15], ['Item 2', 2, 7.5], ['Item 3', 4, 3.75]];

$invoice = (new Invoice())
    ->setAmount(45)
    ->setInvoiceNumber(1)
    ->setStatus(InvoiceStatus::Pending);

foreach ($items as [$description, $quantity, $unitPrice]) {
    $item = (new InvoiceItem())
    ->setDescription($description)
    ->setQuantity($quantity)
    ->setUnitPrice($unitPrice);

    $invoice->addItem($item);
}

$entityManager->persist($invoice);

//$invoice = $entityManager->find(Invoice::class, 11);
//
//$invoice->setStatus(InvoiceStatus::Paid);
//
//$invoice->getItems()->get(0)->setDescription('Foo Bar');

$entityManager->flush();

//echo $entityManager->getUnitOfWork()->size();
