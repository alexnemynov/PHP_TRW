<?php

declare(strict_types=1);

namespace app\Classes\Variance;

class Cat extends Animal
{
    public function speak()
    {
        echo $this->name . " meows";
    }
}