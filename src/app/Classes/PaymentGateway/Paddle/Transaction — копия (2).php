<?php

declare(strict_types=1);

namespace App\Classes\PaymentGateway\Paddle;

class Transaction
{
    private static int $count = 0;

    public function __construct(
        public float $amount,
        public string $description
    ) {
        self::$count++;
    }

    public static function getCount(): int
    {
        return self::$count;
    }

    public function process()
    {
        array_map(function ($transaction) {
            var_dump($this->amount);
        }, [1]);

        array_map(static function ($transaction) {
            $this->amount = 35;
        }, [1]);

        echo "Processing paddle transaction...\n";
    }
}
