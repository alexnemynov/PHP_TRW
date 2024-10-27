<?php

declare(strict_types=1);

namespace App\Classes\PaymentGateway\Paddle;

class Transaction
{
    private float $amount;

    public function __construct(
        float $amount
    ) {
        $this->amount = $amount;
    }

    public function copyFrom(Transaction $transaction)
    {
        var_dump($transaction->amount);
    }

    public function process()
    {
        echo "Processing $" . $this->amount . ' transaction' . "\n";

        $this->generateReceipt();
    }

    private function generateReceipt()
    {
    }
}
