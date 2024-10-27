<?php

declare(strict_types=1);

namespace App\Enums;

enum Color: string
{
    case Orange = 'orange';
    case Green = 'green';
    case Red = 'red';
    case Gray = 'gray';

    public function getClass()
    {
        return 'color-' . $this->value;
    }
}