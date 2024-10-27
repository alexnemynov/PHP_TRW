<?php

namespace App\Classes;

class Invoice
{
    private int $id = 666;
//    protected array $data = [];
//
//    public function __get(string $name)
//    {
//        if (array_key_exists($name, $this->data)) {
//            return $this->data[$name];
//        }
//
//        return null;
//    }
//
//    public function __set(string $name, $value): void
//    {
//        $this->data[$name] = $value;
//    }
//
//    public function __isset(string $name): bool
//    {
//        var_dump('isset');
//        return array_key_exists($name, $this->data);
//    }
//
//    public function __unset(string $name): void
//    {
//        unset($this->data[$name]);
//    }

    protected function process(float $amount, $description)
    {
        var_dump('process', $amount, $description);
    }

    public function __call(string $name, array $arguments)
    {
        if (method_exists($this, $name)) {
            return $this->$name(...$arguments); // еще можно call_user_func_array
        }
    }

    public static function __callStatic(string $name, array $arguments)
    {
        var_dump('static', $name, $arguments);
    }

    public function __toString(): string // when call object as a string
    {
        return 'hello';
    }

    public function __invoke() // when call object directly
    {
        var_dump('__invoke');
    }

    public function __debugInfo(): ?array // when uou var_dump the object
    {
        return ['id' => $this->id];
    }
}
