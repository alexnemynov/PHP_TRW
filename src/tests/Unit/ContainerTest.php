<?php

declare(strict_types=1);

namespace tests\Unit;

use Illuminate\Container\Container;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    /**
     * @var Container
     */
    private Container $container;

    protected function setUp(): void
    {
        parent::setUp();
        $this->container = new Container();
    }

    #[Test]
    public function testItHas()
    {
        $users = new class () {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };
        $this->container->bind('test', $users::class);
        $this->assertSame(true, $this->container->has('test'));
    }

    #[Test]
    public function testItSet()
    {
        $users = new class () {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };
        $this->container->bind('test', $users::class);
        $this->assertSame($users::class, $this->container->get('test'));
    }
}
