<?php

namespace App\Classes;

class AllInOneCoffeeMaker extends CoffeeMaker
{
    use LatteTrait {
        LatteTrait::makeLatte as makeOriginalLatte;
    }
    use CappuccinoTrait {
        CappuccinoTrait::makeLatte insteadof LatteTrait;
        CappuccinoTrait::makeCappucino as public;
    }
}
