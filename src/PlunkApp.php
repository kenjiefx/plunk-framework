<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework;
use Kenjiefx\PlunkFramework\Router;
use Kenjiefx\PlunkFramework\Exporter;
use Kenjiefx\PlunkFramework\Container;

class PlunkApp {

    public function __construct(
        private Router $router,
        private Exporter $exporter,
        private Container $container
        )
    {
        $this->container->register();
    }

    public function serve()
    {
        try {
            $this->router->register()->route();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function export()
    {
        try {
            $this->exporter->register()->export();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

}
