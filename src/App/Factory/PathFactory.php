<?php
declare(strict_types=1);
namespace Kenjiefx\PlunkFramework\App\Factory;
use Kenjiefx\PlunkFramework\App\Helpers\Path;

class PathFactory {

    public static function create(
        string $path
        )
    {
        $pathObject = new Path();
        $pathObject->set()->path = $path;
        return $pathObject;
    }

}
