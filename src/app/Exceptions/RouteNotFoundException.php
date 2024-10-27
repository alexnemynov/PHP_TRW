<?php

namespace App\Exceptions;

class RouteNotFoundException extends \Exception
{
    public $message = "Route not found 404";
}
