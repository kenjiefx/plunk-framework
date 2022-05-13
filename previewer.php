<?php
use Slim\Factory\AppFactory;
use Kenjiefx\PlunkFramework\App\Factories\ContainerFactory;
use Kenjiefx\PlunkFramework\PlunkApp;
use Kenjiefx\PlunkFramework\Router;
use Kenjiefx\PlunkFramework\Container;

define('ROOT',__DIR__);
require ROOT.'/vendor/autoload.php';

$app = AppFactory::create();
$container = ContainerFactory::create();

$plunk = new PlunkApp(
    new Router($app),
    new Container($container)
);
$plunk->serve();
