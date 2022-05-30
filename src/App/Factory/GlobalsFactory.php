<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Factory;
use Kenjiefx\PlunkFramework\App\Build\Globals;

class GlobalsFactory {

    public static function create()
    {
        return new Globals();
    }

}
