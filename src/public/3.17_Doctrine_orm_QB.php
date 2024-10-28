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

try {
    $entityManager->beginTransaction();
    $queryBuilder = $entityManager->createQueryBuilder();

    // ORM Query Builder
    // WHERE amount > :amount AND (status = :status OR createdAt > :date)
    $query = $queryBuilder
        ->select('i', 'it')
        ->from(Invoice::class, 'i')
        ->join('i.items', 'it')
        ->where($queryBuilder->expr()->andX(
            $queryBuilder->expr()->gt('i.amount', ':amount'),
            $queryBuilder->expr()->orX(
                $queryBuilder->expr()->eq('i.status', ':status'),
                $queryBuilder->expr()->gte('i.createdAt', ':date')
            )
        ))
        ->setParameter('amount', 100)
        ->setParameter('status', InvoiceStatus::Paid->value)
        ->setParameter('date', new \DateTime('2023-12-31'))
        ->orderBy('i.createdAt', 'DESC')
        ->getQuery();

//var_dump($query->getArrayResult());
//exit();

//echo $query->getDQL();

    $invoices = $query->getResult();

    /**
     * @var Invoice $invoice
     */
    foreach ($invoices as $invoice) {
        echo $invoice->getCreatedAt()->format('d/m/Y H:i:s')
            . ", " . $invoice->getAmount()
            . ", " . $invoice->getStatus()->toString() . PHP_EOL;

        foreach ($invoice->getItems() as $invoiceItem) {
            echo " - " . $invoiceItem->getDescription()
                . ", " . $invoiceItem->getQuantity()
                . ", " . $invoiceItem->getUnitPrice() . PHP_EOL;
        }
    }

    $entityManager->commit();
} catch (\Throwable $e) {
    if ($entityManager->getConnection()->isTransactionActive()) {
        $entityManager->rollBack();
    }
}

