<?php

namespace App\Classes;

class Rocky implements DebtCollector
{

    public function collect(float $owedAmount): float
    {
        return $owedAmount * 0.65;
    }
}
