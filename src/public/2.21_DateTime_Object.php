<?php

require_once __DIR__ . '/../vendor/autoload.php';

/*
day/month/year - europe - parse -
month/day/year - us - parse /
*/
$date = '15/12/2021';

//$dateTime = new \DateTime(str_replace('/', '-', $date), new \DateTimeZone('Europe/Berlin'));
//
//echo $dateTime->getTimezone()->getName() . ' - ' . $dateTime->format('Y-m-d H:i:s') . PHP_EOL;
//
//$dateTime->setTimezone(new \DateTimeZone('Asia/Hong_Kong'));
//$dateTime->setDate(2021, 12, 15)->setTime(19, 19, 19);
//echo $dateTime->getTimezone()->getName() . ' - ' . $dateTime->format('Y-m-d H:i:s') . PHP_EOL;


$dateTime = \DateTime::createFromFormat('d/m/Y', $date);
//var_dump($dateTime, new \DateTime('15-12-2021'));


$dateTime1 = new \DateTime('05-01-2022 14:35');
$dateTime2 = new \DateTime('06-04-2022 10:32');
$interval = new \DateInterval('P3M2D');
$interval->invert = 1;

//var_dump($dateTime1->diff($dateTime2)->format("%R%a"));

$dateTime = new \DateTime('31-08-2024 09:35');
$dateTime->add($interval);

//echo $dateTime->format("d/m/Y H:i:s") . "\n";

$dateTime->sub($interval);

//echo $dateTime->format("d/m/Y H:i:s") . "\n";

$from = new \DateTime();
$to = $from->add(new \DateInterval('P1M'));
var_dump($from === $to);

echo $from->format('d/m/Y') . ' - ' . $to->format('d/m/Y') . PHP_EOL;

$from = new \DateTime();
$to = (clone $from)->add(new \DateInterval('P1M'));
echo $from->format('d/m/Y') . ' - ' . $to->format('d/m/Y') . PHP_EOL;


$from = new DateTimeImmutable();
$to = $from->add(new \DateInterval('P1M'));
var_dump($from == $to);

echo $from->format('d/m/Y') . ' - ' . $to->format('d/m/Y') . PHP_EOL;

$to->add(new \DateInterval('P1Y'));
echo $from->format('d/m/Y') . ' - ' . $to->format('d/m/Y') . PHP_EOL;
$to = $to->add(new \DateInterval('P1Y'));
echo $from->format('d/m/Y') . ' - ' . $to->format('d/m/Y') . PHP_EOL;

$period = new \DatePeriod($from, new \DateInterval('P9D'), $to->modify('+1 day'), DatePeriod::EXCLUDE_START_DATE);

foreach ($period as $date) {
    echo $date->format('d/m/Y') . PHP_EOL;
}