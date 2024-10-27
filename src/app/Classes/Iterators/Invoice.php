<?php

namespace App\Classes\Iterators;

class Invoice
{
    public string $id;

    public function __construct(public float $amount)
    {
        $this->id = rand(999, 100000);
    }
}