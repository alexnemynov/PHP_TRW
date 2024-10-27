<?php

namespace App\Classes\ErrorHandling;

use App\Classes\Exception\InvoiceException;
use App\Classes\Exception\MissingBillingINfoException;

class Invoice
{
    public function __construct(public Customer $customer)
    {
    }

    /**
     * @throws \Exception
     */
    public function process(float $amount): void
    {
        if ($amount <= 0) {
            throw InvoiceException::invalidAmount(); // более дженерик подход
        }

        if (empty($this->customer->getBillingInfo())) {
            throw new MissingBillingINfoException(); // более конкретный
        }

        echo 'Processing $' . $amount . ' invoice - ';

        sleep(1);

        echo 'OK' . PHP_EOL;
    }
}