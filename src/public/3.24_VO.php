<?php

declare(strict_types=1);

require_once __DIR__ . "/../vendor/autoload.php";

use App\Services\Shipping\BillableWeightCalculatorService;
use App\Services\Shipping\DimDivisor;
use App\Services\Shipping\PackageDimension;
use App\Services\Shipping\Weight;


$package = [
    'weight' => 6,
    'dimensions' => [
        'height' => 7,
        'width' => 9,
        'length' => 15,
        ]
];

$packageDimension = new PackageDimension(
    $package['dimensions']['height'],
    $package['dimensions']['width'],
    $package['dimensions']['length'],
);

$widerPackageDimension = $packageDimension->increaseWidth(10);

$billableWeight = (new BillableWeightCalculatorService())->calculate(
    new Weight($package['weight']),
    $packageDimension,
    DimDivisor::FEDEX
);

$widerBillableWeight = (new BillableWeightCalculatorService())->calculate(
    new Weight($package['weight']),
    $widerPackageDimension,
    DimDivisor::FEDEX
);

echo $billableWeight . ' lb' . PHP_EOL;
echo $widerBillableWeight . ' lb' . PHP_EOL;
