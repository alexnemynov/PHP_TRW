<?php

namespace App\Classes;

class ClassA
{
    protected static string $name = 'A';

    public static function getName(): string
    {
        return static::$name;
    }

    public static function make()
    {
        return new static();
    }

}
