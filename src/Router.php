<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework;
use Slim\App as RouteServiceProvider;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Kenjiefx\PlunkFramework\App\Factories\ContainerFactory as Container;
use Kenjiefx\PlunkFramework\App\Previewer\Template as TemplatePreviewer;

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
            $previewer = Container::create()->get(TemplatePreviewer::class);
            $response->getBody()->write($previewer->preview($request->getUri()));
            return $response;
        });
        return $this;
    }

    public function extend(
        array $args
        )
    {
        $this->RouteServiceProvider->get($args[0],$args[1]);
    }

    public function route()
    {
        return $this->RouteServiceProvider->run();
    }



}
