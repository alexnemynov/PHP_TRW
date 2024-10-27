<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

//$collector = new CollectionAgency();
$service = new \app\Classes\DebtCollectionService();

echo $service->collectDebt(new \app\Classes\Rocky()) . PHP_EOL;
