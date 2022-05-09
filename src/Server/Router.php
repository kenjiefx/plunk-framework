<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\Server;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Kenjiefx\PlunkFramework\View\ViewController;
use Kenjiefx\PlunkFramework\Theme\ThemeEngine;

class Router {

    public static function make(
        \Slim\App $server
        )
    {
        $server->get('/preview', function (Request $request, Response $response, $args) {
            $theme = new ThemeEngine(ViewController::index($request));
            return $response;
        });
    }

    public static function abort()
    {
        echo 'Route::Not Found';
    }

}
