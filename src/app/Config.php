<?php

namespace App;

/**
 * @property-read ?array $db
 * @property-read ?array $mailer
 * @property-read ?array $apiKeys
 */
class Config
{
    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'host'          => $env['DB_HOST'],
                'user'      => $env['DB_USER'],
                'password'      => $env['DB_PASS'],
                'dbname'      => $env['DB_DATABASE'],
                'driver'        => $env['DB_DRIVER'] ?? 'pdo_mysql',
                'charset'       => 'utf8',
                'collation'     => 'utf8_unicode_ci',
                'prefix'        => '',
                ],
            'mailer' => [
                'dsn'           => $env['MAILER_DSN'] ?? '',
                ],
            'apiKeys' => [
                'emailable' => $env['EMAILABLE_API_KEY'] ?? '',
                'abstract_api' => $env['ABSTRACT_API_KEY'] ?? '',
                ],
            ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}
