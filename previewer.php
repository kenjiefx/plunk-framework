<?php
use Slim\Factory\AppFactory;
use Kenjiefx\PlunkFramework\App\Factories\ContainerFactory;
use Kenjiefx\PlunkFramework\PlunkApp;
use Kenjiefx\PlunkFramework\Router;
use Kenjiefx\PlunkFramework\Container;

define('ROOT',__DIR__);
require ROOT.'/vendor/autoload.php';

$app = AppFactory::create();
$router = new Router($app);
$router->extend(Kenjiefx\PlunkFramework\ExternalRouter::ExampleExternalRouteExtension());

$container = ContainerFactory::create();


$plunk = new PlunkApp(
    $router,
    new Container($container)
);
$plunk->serve();
