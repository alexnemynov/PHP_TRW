<?php

require_once dirname(__DIR__) . "/vendor/autoload.php";

$fields = [
    new \app\Classes\Text('baseField'),
    new \app\Classes\Checkbox('baseField'),
    new \app\Classes\Radio('baseField'),
];

foreach ($fields as $field) {
    echo $field->render() . '<br>';
}