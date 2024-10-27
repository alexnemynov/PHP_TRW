<?php

namespace app\Classes\Composition;

class SalesTaxCalculator
{
    public function calculate(float|int $total): float
    {
        return round(($total * 7 / 100), 2);
    }
}
