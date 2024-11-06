<?php

declare(strict_types=1);

// Create Container using PHP-DI
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions(__DIR__ . '/container_bindings.php');

return $containerBuilder->build();
