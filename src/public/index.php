<?php

declare(strict_types=1);

use App\Config;
use DI\Container;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Twig\Extra\Intl\IntlExtension;
use function DI\create;

require_once __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// Create Container using PHP-DI
$container = new Container();

$container->set(Config::class, create(Config::class)->constructor($_ENV));
$container->set(EntityManager::class, fn(Config $config) => new EntityManager(
    DriverManager::getConnection($config->db),
    ORMSetup::createAttributeMetadataConfiguration([dirname(__DIR__) . 'app/Entity']),
));

// Set container to create App with on AppFactory
AppFactory::setContainer($container);

$app = AppFactory::create();

// Create Twig
$twig = Twig::create(
    VIEW_PATH,
    [
        'cache' => STORAGE_PATH . '/cache',
        'auto_reload' => true,
        ]
);
$twig->addExtension(new IntlExtension());

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $twig));

$app->get('/', [HomeController::class, 'index']);
$app->get('/invoices', [InvoiceController::class, 'index']);

$app->run();
