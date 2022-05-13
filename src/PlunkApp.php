<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework;
use Kenjiefx\PlunkFramework\Router;
use Kenjiefx\PlunkFramework\Container;

class PlunkApp {

    public function __construct(
        private Router $router,
        private Container $container
        )
    {

    }

    public function serve()
    {
        $this->container->register();
        try {
            $this->router->register()->route();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}
