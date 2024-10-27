<?php

namespace App\Classes\DocBlock;

class Transaction
{
    /** @var Customer */
    private Customer $customer;
    /** @var @var float */
    private $amount;

    /**
     * @param Customer[] $arr
     * @return void
     */
    public function foo(array $arr)
    {
        foreach ($arr as $obj) {
            $obj->name;
        }
    }

}