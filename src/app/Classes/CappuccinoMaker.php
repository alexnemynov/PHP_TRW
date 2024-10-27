<?php

namespace App\Classes;

class CappuccinoMaker extends CoffeeMaker
{
    use CappuccinoTrait {
        CappuccinoTrait::makeCappucino as public;
    }

    public function makeCappucino(): void
    {
        echo static::class . ' is making cappucino [UPDATED]' . PHP_EOL;
    }
}
