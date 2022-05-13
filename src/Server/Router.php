<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\Server;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Kenjiefx\PlunkFramework\Theme\ThemeEngine;
use Kenjiefx\PlunkFramework\Theme\ThemeEntity;
use Kenjiefx\PlunkFramework\Theme\ThemeOptions;

class Router {

    public static function make(
        \Slim\App $server
        )
    {
        $server->get('/preview', function (Request $request, Response $response, $args) {
            $theme = new ThemeEngine(new ThemeEntity(new ThemeOptions($request->getUri())));
            $theme->render();
            // $view = new View($theme->render());
            return $response;
        });
    }

    public static function abort()
    {
        echo 'Route::Not Found';
    }

}
