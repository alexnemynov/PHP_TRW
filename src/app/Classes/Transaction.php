<?php

declare(strict_types=1);

namespace App\Classes;

class Transaction
{
    private ?Customer $customer = null;

    public function __construct(private float $amount, private string $description)
    {
    }

    public function addTax(float $rate): Transaction
    {
        $this->amount += $this->amount * $rate / 100;

        return $this;
    }

    public function applyDiscount(float $rate): Transaction
    {
        $this->amount -= $this->amount * $rate / 100;

        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function __destruct()
    {
//        echo 'Destruct ' . $this->description . '<br>';
    }

    /**
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }
}
