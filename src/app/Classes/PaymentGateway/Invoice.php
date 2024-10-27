<?php

namespace App\Classes\PaymentGateway;

use App\Classes\PaymentGateway\Stripe\Mail;

class Invoice
{
    use Mail;

    public function process()
    {
        echo 'Processing invoice';

        $this->sendEmail();
    }
}
