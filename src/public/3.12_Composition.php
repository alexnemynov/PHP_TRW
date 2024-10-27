<?php

declare(strict_types=1);

use app\Classes\Composition\Invoice;
use app\Classes\Composition\SalesTaxCalculator;

require_once __DIR__ . '/../vendor/autoload.php';

(new Invoice((new SalesTaxCalculator())))->create(
    [
        ['description' => 'item 1', 'quantity' => 1, 'unitPrice' => 15.25],
        ['description' => 'item 2', 'quantity' => 2, 'unitPrice' => 2],
        ['description' => 'item 3', 'quantity' => 3, 'unitPrice' => 0.25],
    ]
);
