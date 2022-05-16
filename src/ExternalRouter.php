<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ExternalRouter {

    public static function ExampleExternalRouteExtension(){
        return [
            '/external-sample-url',
            function(Request $request, Response $response, $args){
                echo "This is an external Route handler";
            }
        ];
    }

}
