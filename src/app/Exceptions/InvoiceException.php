<?php

namespace App\Exceptions;

class InvoiceException extends \Exception
{


    public static function invalidAmount()
    {
        return new static("InvoiceController amount must be a positive number");
    }
}