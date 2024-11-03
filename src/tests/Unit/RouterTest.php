<?php

declare(strict_types=1);

namespace tests\Unit;

use App\Exceptions\RouteNotFoundException;
use App\Router;
use Illuminate\Container\Container;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /**
     * @var Router
     */
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router(new Container());
    }

    #[Test]
    public function testItRegistersRoute(): void
    {
        $this->router->register('GET', '/users', ['Users', 'index']);
        $expected = [
            'GET' => [
                '/users' => ['Users', 'index']
                ],
        ];
        $this->assertSame($expected, $this->router->getRoutes());
    }

    #[Test]
    public function testItRegistersGetRoute(): void
    {
        $this->router->get('/users', ['Users', 'index']);
        $expected = [
            'GET' => [
                '/users' => ['Users', 'index']
            ],
        ];
        $this->assertSame($expected, $this->router->getRoutes());
    }

    #[Test]
    public function testItRegistersPostRoute(): void
    {
        $this->router->post('/invoices/create', ['Users', 'store']);
        $expected = [
            'POST' => [
                '/invoices/create' => ['Users', 'store']
            ],
        ];
        $this->assertSame($expected, $this->router->getRoutes());
    }

    #[Test]
    public function testThereAreNoRoutesWhenRouterIsCreated(): void
    {
        // типа вдруг в роутере при создании уже есть маршруты либо он не инициализирован
        $this->assertEmpty((new Router(new Container()))->getRoutes());
    }

    #[Test]
    #[DataProviderExternal(\tests\DataProviders\RouterDataProvider::class, 'routeNotFoundCases')]
    public function testItThrowsRouteNotFoundException(
        string $requestUri,
        string $requestMethod
    ): void {
        $users = new class ()
        {
            public function delete(): bool
            {
                return true;
            }
        };

        $this->router->post('/users', [$users::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);

        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }

    #[Test]
    public function testItResolvesRouteFromClosure(): void
    {
        $this->router->get('/users', fn () => [1, 2, 3]);

        $this->assertSame(
            [1, 2, 3],
            $this->router->resolve('/users', 'GET')
        );
    }

    #[Test]
    public function testItResolvesRoute(): void
    {
        $users = new class () {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };

        $this->router->get('/users', [$users::class, 'index']);

        // asserEquals = ==
        // assertSame = ===
        $this->assertSame([1, 2, 3], $this->router->resolve('/users', 'GET'));
    }
}
