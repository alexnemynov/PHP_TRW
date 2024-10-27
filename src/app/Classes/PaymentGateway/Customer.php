<?php

namespace App\Classes\PaymentGateway;

use App\Classes\PaymentGateway\Stripe\Mail;

class Customer
{
    use Mail;

    public function updateProfile()
    {
        echo 'Profile updated' . PHP_EOL;

        $this->sendEmail();
    }
}
