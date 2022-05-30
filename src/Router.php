<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework;
use Slim\App as RouteServiceProvider;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Kenjiefx\PlunkFramework\App\Factory\ContainerFactory as Container;
use Kenjiefx\PlunkFramework\App\Preview\Preview;

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

        /**
         * =================================================================
         * Template Previewer
         * =================================================================
         */
        $this->RouteServiceProvider->get('/preview/template', function (Request $request, Response $response, $args) {
            $previewer = Container::create()->get(Preview::class);
            $previewer->set()->base = 'template';
            $previewer->set()->options = $request->getUri();
            $previewer->preview();
            return $response;
        });

        /**
         * =================================================================
         * Module Previewer
         * Aside from previewing a template, Plunk Frameork, by default
         * would let you preview individual modules
         * =================================================================
         */
        $this->RouteServiceProvider->get('/preview/module', function (Request $request, Response $response, $args) {
            $previewer = Container::create()->get(ModulePreviewer::class);
            $response->getBody()
                     ->write($previewer->preview($request->getUri()));
            return $response;
        });

        /**
         * =================================================================
         * Style - /assets/style
         * Returns CSS files
         * This call would require to pass uri parameters in the form of:
         * ?theme=Name Of The Theme&target=target_css_file.css
         * =================================================================
         */
        $this->RouteServiceProvider->get('/assets/style', function (Request $request, Response $response, $args) {
            $asset = Container::create()->get(AssetPreviewer::class);
            $response->getBody()
                     ->write($asset->preview($request->getUri()));
            return $response
                ->withHeader('Content-Type', 'text/css')
                ->withStatus(200);
        });

        /**
         * =================================================================
         * Script - /assets/script
         * Returns Javascript files
         * This call would require to pass uri parameters in the form of:
         * ?theme=Name Of The Theme&target=target_script_file.js
         * =================================================================
         */
        $this->RouteServiceProvider->get('/assets/script', function (Request $request, Response $response, $args) {
            $asset = Container::create()->get(AssetPreviewer::class);
            $response->getBody()
                     ->write($asset->preview($request->getUri()));
            return $response
                ->withHeader('Content-Type', 'text/javascript')
                ->withStatus(200);
        });
        return $this;
    }

    /**
     * ===================================================================
     * @method extend
     * This method allows to extend external route
     * @param array $args
     * $args[0]  - The route path
     * $args[0] - call back function
     *
     * NOTE: Please see /src/ExternalRouter.php for basic implementation
     */
    public function extend(
        array $args
        )
    {
        $this->RouteServiceProvider->get($args[0],$args[1]);
    }

    /**
     * @TODO: Decouple the Route Service Provider to be able to use
     * a different router
     */
    public function route()
    {
        return $this->RouteServiceProvider->run();
    }



}
