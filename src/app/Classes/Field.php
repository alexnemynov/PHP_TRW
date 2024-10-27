<?php

namespace App\Classes;

abstract class Field implements Renderable
{
    public function __construct(protected string $name)
    {
    }
}
