<?php

declare(strict_types=1);

namespace app\Classes\Enums;

class Payment
{
    private PaymentStatus $status;

    public function getStatus(): PaymentStatus
    {
        return $this->status;
    }

    public function updateStatus(PaymentStatus $status): Payment
    {
        $this->status = $status;
        return $this;
    }

}