<?php

namespace App\Classes;

class CollectionAgency implements DebtCollector
{
    public function collect(float $owedAmount): float
    {
        $guaranteed = $owedAmount * 0.5;

        return rand($guaranteed, $owedAmount);
    }
}
