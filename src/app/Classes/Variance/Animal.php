<?php

declare(strict_types=1);

namespace app\Classes\Variance;

abstract class Animal
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function speak();

    public function eat(AnimalFood $food)
    {
        echo $this->name . " eats " . get_class($food);
    }
}