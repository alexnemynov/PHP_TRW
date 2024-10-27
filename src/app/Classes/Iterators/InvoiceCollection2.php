<?php

namespace App\Classes\Iterators;

class InvoiceCollection2 implements \Iterator
{
    private int $index;

    public function __construct(public array $array)
    {
    }

    public function current(): mixed
    {
        return $this->array[$this->index];
    }

    public function next(): void
    {
        $this->index++;
    }

    public function key(): mixed
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return isset($this->array[$this->index]);
    }

    public function rewind(): void
    {
        $this->index = 0;
    }
}