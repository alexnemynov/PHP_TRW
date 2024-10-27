<?php

use app\Classes\ToasterPro;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$toaster = new ToasterPro();
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->addSlice('bread');
$toaster->toastBagel();
