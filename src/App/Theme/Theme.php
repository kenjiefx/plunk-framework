<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Theme;
use Kenjiefx\PlunkFramework\App\AccessFacadeTrait;
use Kenjiefx\PlunkFramework\App\AccessFacadeInterface;

class Theme implements AccessFacadeInterface{

    use AccessFacadeTrait;

    private string $name;

    public function __construct()
    {

    }



}
