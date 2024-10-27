<?php

namespace app\Classes\WeakMap;

class Invoice
{
    public function __destruct()
    {
        echo 'Destructing invoice' . PHP_EOL;
    }
}
