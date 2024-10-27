<?php

namespace App\Classes\Iterators;

class Collection implements \IteratorAggregate
{
    public function __construct(private array $array)
    {
    }
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->array);
    }
}