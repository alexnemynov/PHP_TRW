<?php

namespace App\Classes\Serialize;

class Invoice
{
    public string $id;
    public function __construct(public float $amount, public string $description, public string $creditCardNumber)
    {
        $this->id = uniqid('invoice_');
    }

    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'description' => $this->description,
            'creditCardNumber' => base64_encode($this->creditCardNumber),
            'foo' => 'bar',
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->description = $data['description'];
        $this->creditCardNumber = base64_decode($data['creditCardNumber']);
    }
}