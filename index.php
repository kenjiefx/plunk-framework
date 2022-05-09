<?php
use Slim\Factory\AppFactory;
use Kenjiefx\PlunkFramework\App;

define('ROOT',__DIR__);
require ROOT.'/vendor/autoload.php';

$server = new App(AppFactory::create());
$server->boot();
