<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Build;
use Kenjiefx\PlunkFramework\App\AccessFacadeTrait;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;
use Kenjiefx\PlunkFramework\App\Theme\Theme;

class Globals implements AccessFacadeInterface {

    use AccessFacadeTrait;

    private Theme $Theme;
    private array $Plugins;

    public function __construct()
    {
        
    }




}
