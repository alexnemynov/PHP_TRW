<?php

namespace App\Classes;

class FancyOven
{
    public function __construct(private ToasterPro $toaster)
    {
    }

    public function doSomething()
    {

    }

    public function toast()
    {
        $this->toaster->toast();
    }

    public function toastBagel()
    {
        $this->toaster->toastBagel();
    }
}
