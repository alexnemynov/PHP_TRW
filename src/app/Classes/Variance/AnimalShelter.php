<?php

declare(strict_types=1);

namespace app\Classes\Variance;

interface AnimalShelter
{
    public function adopt(string $name): Animal;
}