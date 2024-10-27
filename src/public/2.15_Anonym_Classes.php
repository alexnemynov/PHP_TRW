<?php

use app\Classes\MyInterface;

require_once dirname(__DIR__) . "/vendor/autoload.php";


$obj = new class (1, 2, 3) implements MyInterface
{
    public function __construct(public int $x, public int $y, public int $z)
    {
    }
};

//var_dump(get_class($obj));

foo($obj);

function foo(MyInterface $obj)
{
    //
}

$obj = new \app\Classes\ClassX(1, 2);
var_dump($obj->bar());
