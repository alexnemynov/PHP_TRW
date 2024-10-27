<?php

namespace App\Classes;

class ClassX
{
    public function __construct(public int $x, public int $y)
    {
    }

    public function foo(): string
    {
        return 'foo';
    }

    public function bar(): object
    {
        return new class($this->x, $this->y) extends ClassX
        {
            public function __construct(public int $x, public int $y)
            {
                parent::__construct($x, $y);

                echo $this->foo();
            }
        };
    }
}
