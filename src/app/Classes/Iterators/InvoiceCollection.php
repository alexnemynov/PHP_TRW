<?php

namespace App\Classes\Iterators;

class InvoiceCollection implements \Iterator
{
    public function __construct(public array $array)
    {
    }

    public function current(): mixed
    {
        return current($this->array);
    }

    public function next(): void
    {
        next($this->array);
    }

    public function key(): mixed
    {
        return key($this->array);
    }

    public function valid(): bool
    {
        return key($this->array) !== null;
    }

    public function rewind(): void
    {
        reset($this->array);
    }
}
