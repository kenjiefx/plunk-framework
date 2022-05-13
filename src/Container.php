<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework;
use League\Container\Container as ContainerServiceProvider;
use League\Container\ReflectionContainer;
use Kenjiefx\PlunkFramework\App\Controllers\PreviewController;
use Kenjiefx\PlunkFramework\App\Controllers\ThemeController;

class Container {

    public function __construct(
        private ContainerServiceProvider $ContainerServiceProvider
        )
    {

    }

    public function register()
    {
        $this->ContainerServiceProvider->delegate(
            new ReflectionContainer()
        );
    }

}
