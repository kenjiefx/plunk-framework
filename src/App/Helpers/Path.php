<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Helpers;
use Kenjiefx\PlunkFramework\App\AccessFacadeTrait;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;

class Path implements AccessFacadeInterface{

    use AccessFacadeTrait;
    private string $path;

    public function __construct()
    {
        
    }

}
