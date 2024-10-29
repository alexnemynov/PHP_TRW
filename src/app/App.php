<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use App\Services\PaymentGatewayService;
use App\Services\PaymentGatewayServiceInterface;
use Dotenv\Dotenv;
use Symfony\Component\Mailer\MailerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class App
{
    private Config $config;

    public function __construct(
        protected Container $container,
        protected ?Router $router = null,
        protected array $request = [],
    ) {
    }

    public function boot(): static
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $this->config = new Config($_ENV);

        $this->initDb($this->config->db);

        $this->container->bind(PaymentGatewayServiceInterface::class, PaymentGatewayService::class);
        $this->container->bind(MailerInterface::class, fn() => new CustomMailer($this->config->mailer['dsn']));

        return $this;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], $this->request['method']);
        } catch (RouteNotFoundException) {
            http_response_code(404);

            echo View::make('error/404');
        }
    }

    public function initDb(array $config): void
    {
        $capsule = new Capsule();

        $capsule->addConnection($config);
        // Set the event dispatcher used by Eloquent models... (optional)
        $capsule->setEventDispatcher(new Dispatcher($this->container));
        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();
        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
    }
}
