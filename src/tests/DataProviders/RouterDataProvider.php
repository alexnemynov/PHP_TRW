<?php

declare(strict_types=1);

namespace tests\DataProviders;

class RouterDataProvider
{
    public static function routeNotFoundCases(): array
    {
        return [
            ['/users', 'put'], // request method not found
            ['/invoices', 'POST'], // route not found
            ['/users', 'GET'], // class doesn't exist (Users)
            ['/users', 'POST'], // method doesn't exist
        ];
    }
}
