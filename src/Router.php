<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework;
use Slim\App as RouteServiceProvider;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Kenjiefx\PlunkFramework\App\Factories\ContainerFactory as Container;
use Kenjiefx\PlunkFramework\App\Controllers\PreviewController;

class Router {

    public function __construct(
        private RouteServiceProvider $RouteServiceProvider
        )
    {

    }

    public function register()
    {
        $this->RouteServiceProvider->get('/', function (Request $request, Response $response, $args) {
            $response->getBody()->write("Hello world!");
            return $response;
        });
        $this->RouteServiceProvider->get('/preview/template/{template}', function (Request $request, Response $response, $args) {
            $previewer = Container::create()->get(PreviewController::class);
            $previewer->template();
            return $response;
        });
        return $this;
    }

    public function route()
    {
        return $this->RouteServiceProvider->run();
    }



}
