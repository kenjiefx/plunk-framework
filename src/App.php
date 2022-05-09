<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework;
use Kenjiefx\PlunkFramework\Server\Router;

class App {

    public function __construct(
        private \Slim\App $app
        )
    {

    }

    public function boot()
    {
        Router::make($this->app);
        return $this->serve();
    }

    public function serve()
    {
        try {
            $this->app->run();
        } catch (\Exception $e) {
            Router::abort();
        }

    }

}
