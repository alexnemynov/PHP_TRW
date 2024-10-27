<?php

declare(strict_types=1);

namespace App\Classes\PaymentGateway\Paddle;

use App\Classes\Enums\Status;

class Transaction
{
    private string $status;

    public function __construct()
    {
        $this->setStatus(Status::PENDING);
    }

    public function setStatus(string $status): self
    {
        if (! isset(Status::ALL_STATUSES[$status])) {
            throw new \InvalidArgumentException('Invalid transaction status: ' . $status);
        }
        $this->status = $status;

        return $this;
    }
}
