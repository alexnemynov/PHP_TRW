<?php

namespace App\Classes;

class Invoice1 {
    public function __construct(public float $amount, public string $description)
    {
    }

}