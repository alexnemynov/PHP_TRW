<?php

namespace App\Classes;

class DB {
    private static ?DB $instance = null;

    private function __construct(public array $config)
    {
        echo 'Instance created' . PHP_EOL . '<br>';
    }

    public static function getInstance(array $config): DB
    {
        if (is_null(self::$instance)) {
            self::$instance = new DB($config);
        }

        return self::$instance;
    }

}