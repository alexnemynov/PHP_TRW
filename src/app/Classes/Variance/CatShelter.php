<?php

declare(strict_types=1);

namespace app\Classes\Variance;

class CatShelter implements AnimalShelter
{
    public function adopt(string $name): Cat // instead of returning class type Animal, it can return class type Cat
    {
        return new Cat($name);
    }
}