<?php

namespace App\Classes;

trait CappuccinoTrait
{
    use LatteTrait;
    private function makeCappucino()
    {
        echo static::class . ' is making cappucino' . PHP_EOL;
    }
}