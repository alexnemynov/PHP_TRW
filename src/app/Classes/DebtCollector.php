<?php

namespace App\Classes;

interface DebtCollector extends AnotherInterface, SomeOtherInterface
{
    public function collect(float $owedAmount): float;
}
