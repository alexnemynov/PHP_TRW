<?php

namespace App\Exceptions;

class MissingBillingINfoException extends \Exception
{
    protected $message = "Missing billing information";
}
